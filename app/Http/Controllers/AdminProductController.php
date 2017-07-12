<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\UpdateRequest;

class AdminProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', ['products' => Product::all()]);
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(UpdateRequest $request)
    {
        $product = new Product();
        $product->fill($request->input());
        $product->save();

        return view('admin.products.index', ['products' => Product::all()]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', ['product' => $product]);
    }

    public function update($id, UpdateRequest $request)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->input());
        $product->save();

        return view('admin.products.index', ['products' => Product::all()]);
    }
}
