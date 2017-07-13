<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class AdminProductController extends Controller {

    public function index() {
        return view('admin.products.index', ['products' => Product::all()]);
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(StoreRequest $request) {
        $product = Product::updateOrCreate(
        [
            'image_path' => $request->image_path,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return view('admin.products.index', ['products' => Product::all()]);
    }

    public function edit($id) {
        $product = Product::findOrFail($id);

        return view('admin.products.edit', ['product' => $product]);
    }

    public function update($id, UpdateRequest $request) {
        $product = Product::findOrFail($id);
        $product->fill($request->input());
        $product->save();

        return view('admin.products.index', ['products' => Product::all()]);
    }
    
    public function getDelete($id) {
        $product = Product::findOrFail($id);
        
        return view('admin.products.delete', ['product' => $product]);
    }
    
    public function postDelete($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        
        return view('admin.products.index', ['products' => Product::all()]);        
    }
    
    public function geloescht() {
        $product = Product::onlyTrashed()->get();
        
        return view('admin.products.restore', ['products' => $product]);
    }
    
    public function restored($id) {
        $product = Product::onlyTrashed();
        $product->where('id', $id)->restore();
        
        $products = Product::onlyTrashed()->get();
        
        return view('admin.products.restore', ['products' => $products]);   
    }

}
