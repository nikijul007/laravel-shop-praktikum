<?php

namespace App\Http\Controllers;

use Auth;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Card;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\AddToCardRequest;

class ProductController extends Controller
{
    public function getIndex()
    {
        return view('shop/index', ['products' => Product::all()]);
    }

    public function addToCard($id, AddToCardRequest $request)
    {
        $product = Product::findOrFail($id);
        $amount = (int) $request->input('anzahl');

        $card = new Card(session()->get('card'));
        $card->add($product, $amount);

        $request->session()->put('card', $card);

        return redirect()->route('product.index')->with('success', $card->message());
    }

    public function addOne($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $card = new Card(session()->get('card'));

        $card->addOne($product);
        $request->session()->put('card', $card);

        return redirect()->route('product.shoppingCard')->with('success', $card->message());
    }

    public function remove1($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $card = new Card(session()->get('card'));
        $card->reduceAmountOneFrom($product);

        if (count($card->items) > 0) {
            $request->session()->put('card', $card);

            return redirect()->route('product.shoppingCard')->with('success', $card->message());
        }

        $request->session()->forget('card');

        return redirect()->route('product.shoppingCard')->with('success', $card->message());
    }

    public function removeAll(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $card = new Card(session()->get('card'));
        $card->reduceAllFrom($product);

        if (count($card->items) > 0) {
            $request->session()->put('card', $card);

            return redirect()->route('product.shoppingCard')->with('success', $card->message());
        }

        $request->session()->forget('card');

        return redirect()->route('product.shoppingCard')->with('success', $card->message());
    }

    public function deleteCard()
    {
        session()->forget('card');

        return view('shop/index', ['products' => Product::all()]);
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

        return view('shop.checkout', ['total' => $card->totalPrice]);
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
            $charge = Charge::create([
                'amount' => $card->totalPrice * 100,
                'currency' => 'eur',
                'source' => $request->input('stripeToken'), // obtained with Stripe.js
                'description' => 'Test Charge!!!',
            ]);
            $order = new Order();
            $order->card = serialize($card);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }
        session()->forget('card');

        return view('shop.index', ['products' => Product::all(), 'success' => 'Successfuly purchased products!']);
    }
}
