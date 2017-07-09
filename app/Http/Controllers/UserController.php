<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller {

    //Sign Up
    public function getSignup() {
        return view('users.signup');
    }

    public function postSignup(Request $request) {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = New User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        Auth::login($user);
        return redirect()->route('users.profile');
    }

    //Sign In
    public function getSignin() {
        return view('users.signin');
    }

    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('users.profile');
        }
        
        $customerErrors = [
            'Ihre Daten sind nicht in unserem System'
        ];
        return view('users.signin')->with(compact('customerErrors'));
        //return redirect()->back()->with('errors');
    }
    
    //Profile
    public function getProfile(){
        return view('users.profile');
    }
    
    //Logout
    public function getLogout(){
        Auth::logout();
        return redirect()->route('product.index');
    }
}
