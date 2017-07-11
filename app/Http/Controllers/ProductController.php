<?php

namespace App\Http\Controllers;

use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Card;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function getIndex() {
        $products = Product::all();

        return view('shop/index', ['products' => $products]);
    }

    public function addToCard(Request $request, $id) {
        $product = Product::find($id);
        $oldCard = session()->get('card');
        $card = new Card($oldCard);
        // TODO: Was passiert wenn die Variable $product den Wert null enthaelt?
        $card->add($product, $product->id);

        $request->session()->put('card', $card);

        return redirect()->route('product.index');
    }

    public function remove1(Request $request, $id) {
        $product = Product::find($id);
        $oldCard = session()->get('card');
        $card = new Card($oldCard);
        // TODO: Was passiert wenn die Variable $product den Wert null enthaelt?
        $card->reduceBy1($product, $product->id);

       if(count($card->items) >0){
            $request->session()->put('card', $card);
            return redirect()->route('product.shoppingCard');
        }
        
        $request->session()->forget('card');
        return redirect()->route('product.shoppingCard');
    }

    public function removeAll(Request $request, $id) {
        $product = Product::find($id);
        $oldCard = session()->get('card');
        $card = new Card($oldCard);
        // TODO: Was passiert wenn die Variable $product den Wert null enthaelt?
        $card->reduceAll($product, $product->id);
        
        if(count($card->items) >0){
            $request->session()->put('card', $card);
            return redirect()->route('product.shoppingCard');
        }
        
        $request->session()->forget('card');
        return redirect()->route('product.shoppingCard');
    }
    
    public function deleteCard() {
        $oldCard = session()->get('card');
        
        $card = new Card($oldCard);
        $card = session()->forget('card');
        $products = Product::all();
        return view('shop/index', ['products' => $products]);
    }

    public function getCard() {
        $oldCard = session()->get('card');
        if ($oldCard === null) {
            return view('shop.shoppingCard', ['products' => null]);
        }
        $card = new Card($oldCard);

        return view('shop.shoppingCard', ['products' => $card->items, 'totalPrice' => $card->totalPrice]);
    }

    public function getCheckout() {
        $oldCard = session()->get('card');
        if ($oldCard === null) {
            return view('shop.shoppingCard', ['products' => null]);
        }
        $card = new Card($oldCard);
        $total = $card->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request) {
        $oldCard = session()->get('card');
        if ($oldCard === null) {
            return redirect()->route('product.shoppingCard');
        }
        $card = new Card($oldCard);

        Stripe::setApiKey('sk_test_c00bt8xmSZmdfcN5ahiRpCEh');
        try {
            $charge = Charge::create(array(
                "amount" => $card->totalPrice * 100,
                "currency" => "eur",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge!!!"
            ));
            $order = new Order();
            $order->card = serialize($card);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;
            
            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        $card = session()->forget('card');
        $products = Product::all();

        return view('shop/index', ['products' => $products, 'success' => 'Successfuly purchased products!']);

//        return redirect()->route('product.index')->with('success', 'Successfuly purchased products!');
    }

}
