<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditAdminRequest;
use App\Http\Requests\Admin\UpdateAdminPassword;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller

{
    public function profile($id){
        $user = Admin::find($id);

        return view('backend.admin.home.profile',compact('user'));
    }
    public function passwordUp(){
        return view('backend.admin.home.changepassword');
    }
    public function profileUpdate(EditAdminRequest $request, $id){

        $admin = Admin::find($id);
        $data = $request->all();
        $slug = Str::slug($request->input('title'));
        $slug_count = Admin::where('slug', $slug)->count();
        if ($slug_count>0){
            $slug= $slug.time();
        }
        $password = Hash::make($request->password);
        $data['password'] = $password;
        $data['slug'] = $slug;
        $status = $admin->fill($data)->save();
        if ($status){
            return redirect()->back()->with('success','Your Profile has been updated successfully');
        }else{
            return redirect()->back()->with('errors','Something went wrong');
        }
    }

    public function passwordUpdate(UpdateAdminPassword $request){

        $current_user = auth()->user();
        if (Hash::check($request->current_password, $current_user->password)){

            $current_user->update([
                'password'=>Hash::make($request->new_password),
            ]);
            return redirect()->back()->with('success','Password has been  updated successfully');
        }else{
            return redirect()->back()->with('errors','Old password does not match');
        }
    }
}
