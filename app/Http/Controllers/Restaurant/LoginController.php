<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\RestaurantRegisterRequest;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    public function registerForm(){
        return view('backend.restaurant.auth.restaurant_register');
    }


    public function register(RestaurantRegisterRequest  $request){

        $data       = $request->all();
        $slug       = Str::slug($request->input('name'));
        $slug_count =  Restaurant::where('slug',$slug)->count();
        if ($slug_count>0){
            $slug   = time().$slug;
        }
        $data['slug'] = $slug;
        $password = Hash::make($request->password);
        $data['password'] = $password;

        $status = Restaurant::create($data);
        if ($status){
            return redirect()->intended(route('restaurant'))->with('success','You are logged in');
        }
        else{
            return redirect()->back()->with('errors','Something went wrong');
        }
    }


}
