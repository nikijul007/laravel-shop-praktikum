<?php

namespace App\Http\Controllers;

use Session;
use App\Card;
use App\Product;
use Illuminate\Http\Request;

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
        $oldCard = Session::has('card') ? Session::get('card') : null;
        $card = new Card($oldCard);
        $card->add($product, $product->id);

        $request->session()->put('card', $card);

        return redirect()->route('product.index');
    }

    public function getCard()
    {
        if (! Session::has('card')) {
            return view('shop.shoppingCard', ['products' => null]);
        }
        $oldCard = Session::get('card');
        $card = new Card($oldCard);

        return view('shop.shoppingCard', ['products' => $card->items, 'totalPrice' => $card->totalPrice]);
    }
}
