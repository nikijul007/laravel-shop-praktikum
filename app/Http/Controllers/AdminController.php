<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function getSignin() {
        return view('verwaltung.admin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4',
        ]);

        return redirect()->route('verwaltung.adminpage');
    }

    public function getAdminpage() {

        return view('verwaltung.adminpage');
    }
    
    public function delete($id)
    {
        Product::findOrFail($id)->delete();
    }
    
    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->input());
        
        
        return view('verwaltung.change');
    }

}
