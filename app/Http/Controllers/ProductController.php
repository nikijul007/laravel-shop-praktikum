<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Product;
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
}
