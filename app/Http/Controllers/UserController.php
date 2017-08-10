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

        $oldUrl = session()->get('old_url');
        if ($oldUrl === null) {
            return redirect()->route('users.profile');
        }
        session()->forget('old_url');

        return redirect()->to($oldUrl);
    }

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
            $oldUrl = session()->get('old_url');
            if ($oldUrl === null) {
                return redirect()->route('users.profile');
            }
            session()->forget('old_url');

            return redirect()->to($oldUrl);
        }

        $customerErrors = [
            'Ihre Daten sind nicht in unserem System vorhanden.',
        ];

        return view('users.signin')->with(compact('customerErrors'));
    }

    public function getProfile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key) {
            $order->card = unserialize($order->card);

            return $order;
        });

        return view('users.profile', ['orders' => $orders]);
    }

    public function getLogout()
    {
        Auth::logout();

        return redirect()->route('product.index');
    }
}
