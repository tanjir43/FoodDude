<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditAdminRequest;
use App\Models\Admin;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function  admin(){
        return view('backend.admin.home.dashboard');
    }
    public function profile(){
        return view('backend.admin.home.profile');
    }
    public function profileUpdate(EditAdminRequest $request, $id){

        $admin = Admin::find($id);
        $data = $request->all();
        $slug = Str::slug($request->input('title'));
        $slug_count = Admin::where('slug', $slug)->count();
        if ($slug_count>0){
            $slug= $slug.time();
        }
        $data['slug'] = $slug;
        $status = $admin->fill($data)->save();
        if ($status){
            return redirect()->back()->with('success','Your Profile has been updated successfully');
        }else{
            return redirect()->back()->with('errors','Something went wrong');
        }
    }
}
