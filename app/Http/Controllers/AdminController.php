<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getSignin()
    {
        return view('verwaltung.admin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4',
        ]);

        return redirect()->route('admin.products');
    }

    public function getAdminCreate()
    {
        return view('verwaltung.admin-create');
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
    }
}
