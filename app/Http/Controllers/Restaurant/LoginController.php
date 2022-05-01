<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('backend.restaurant.auth.login');
    }


    public function login(Request $request){
        if (Auth::guard('restaurant')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->intended(route('restaurant'))->with('success','You are logged in');
        }
        else{
            return back()->withInput($request->only('email'));
        }
    }
}
