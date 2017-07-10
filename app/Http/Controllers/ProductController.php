<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class ProductController extends Controller
{
    public function getIndex()
    {
        $products = Product::all();

        return view('shop/index', ['products' => $products]);
    }

    public function addToCard(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCard = session()->get('card');
        $card = new Card($oldCard);
        // TODO: Was passiert wenn die Variable $product den Wert null enthaelt?
        $card->add($product, $product->id);

        $request->session()->put('card', $card);

        return redirect()->route('product.index');
    }

    public function getCard()
    {
        $oldCard = session()->get('card');
        if ($oldCard === null) {
            return view('shop.shoppingCard', ['products' => null]);
        }
        $card = new Card($oldCard);

        return view('shop.shoppingCard', ['products' => $card->items, 'totalPrice' => $card->totalPrice]);
    }
    
    public function getCheckout()
    {
        $oldCard = session()->get('card');
        if ($oldCard === null) {
            return view('shop.shoppingCard', ['products' => null]);
        }
         $card = new Card($oldCard);
         $total = $card->totalPrice;
            return view('shop.checkout', ['total'=> $total]);
    }
    
    public function postCheckout(Request $request)
    {
       $oldCard = session()->get('card');
        if ($oldCard === null) {
            return redirect()->route('product.shoppingCard');
        } 
        $card = new Card($oldCard);
        
        Stripe::setApiKey('sk_test_c00bt8xmSZmdfcN5ahiRpCEh');
        try {
            Charge::create(array(
                "amount" => $card->totalPrice*100,
                "currency" => "eur",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge!!!"
        )); 
        } 
        catch(\Exception $e){
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        $card = session()->forget('card');
        return redirect()->route('product.index')->with('success', 'Successfuly purchased products!');
    }
}
