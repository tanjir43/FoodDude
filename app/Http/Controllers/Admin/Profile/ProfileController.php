<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateNewAdmin;
use App\Http\Requests\Admin\EditAdminRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller

{
    public function profile($id){
        $user = Admin::find($id);

        return view('backend.admin.home.profile',compact('user'));
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

    public function adminRole(){
        return view('backend.admin.home.role');
    }

    public function adminCreateRole(CreateNewAdmin $request){
        $data       = $request->all();
        $slug       = Str::slug($request->input('full_name'));
        $slug_count =  Admin::where('slug',$slug)->count();
        if ($slug_count>0){
            $slug   = time().$slug;
        }
        $data['slug'] = $slug;
        $password = Hash::make($request->password);
        $data['password'] = $password;

        $status = Admin::create($data);
        if ($status){
            return redirect()->back()->with('success','New admin role created successfully');
        }
        else{
            return redirect()->back()->with('errors','Something went wrong');
        }
    }
}
