<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\UpdateRequest;

class AdminProductController extends Controller
{
    public function getCreate(Request $request)
    {
        return view('verwaltung.vorhandeneProdukte', ['products' => Product::all()]);
    }

    public function postCreate(UpdateRequest $request)
    {
        $product = new Product();
        $product->fill($request->input());
        $product->save();

        return view('verwaltung.vorhandeneProdukte', ['products' => Product::all()]);
    }

    public function getChange($id)
    {
        $product = Product::findOrFail($id);

        return view('verwaltung.admin-change', ['product' => $product]);
    }

    public function postChange($id, UpdateRequest $request)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->input());
        $product->save();

        return view('verwaltung.vorhandeneProdukte', ['products' => Product::all()]);
    }

    public function getProducts()
    {
        return view('verwaltung.vorhandeneProdukte', ['products' => Product::all()]);
    }
}
