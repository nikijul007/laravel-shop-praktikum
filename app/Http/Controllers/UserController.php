<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller 
{

    //Sign Up
    public function getSignup() 
    {
        return view('users.signup');
    }

    public function postSignup(Request $request) 
        {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4',
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->save();
        Auth::login($user);
        if (session()->has('OldUrl')) {
            $oldUrl = Session::get('OldUrl');
            session()->forget('OldUrl');
            return redirect()->to($oldUrl);
        }
        return redirect()->route('users.profile');
    }

    //Sign In
    public function getSignin() 
    {
        return view('users.signin');
    }

    public function postSignin(Request $request) 
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (session()->has('OldUrl')) {
                $oldUrl = session()->get('OldUrl');
                session()->forget('OldUrl');
                return redirect()->to($oldUrl);
            }
            return redirect()->route('users.profile');
        }

        $customerErrors = [
            'Ihre Daten sind nicht in unserem System',
        ];

        return view('users.signin')->with(compact('customerErrors'));
    }

    //Profile
    public function getProfile() 
    {
        $orders= Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->card = unserialize($order->card);
            return $order;
        });
        return view('users.profile', ['orders'=>$orders]);
    }

    //Logout
    public function getLogout() 
    {
        Auth::logout();

        return redirect()->route('product.index');
    }
}
