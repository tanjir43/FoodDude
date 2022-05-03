<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\Menu\CreateMenuRequest;
use App\Models\Restaurant;
use App\Models\Restaurant\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{

    public function index()
    {
        $menus = Menu::orderBy('id','desc')->get();
        return view('backend.restaurant.menu.index',compact('menus'));
    }

    public function menuStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('menus')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('menus')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }

    public function create()
    {
        $restaurants = Restaurant::where('status','active')->get();
        return view('backend.restaurant.menu.create',compact('restaurants'));
    }

    public function store(CreateMenuRequest $request)
    {
        $data       = $request->all();
        $status = Menu::create($data);
        if ($status){
            return redirect()->route('menu.index')->with('success','Menu created successfully');
        }
        else{
            return back()->with('errors','Something went wrong');
        }
    }


    public function show(Menu $menu)
    {
        //
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('backend.restaurant.menu.edit',compact('menu'));
    }


    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        if ($menu){
            $data       = $request->all();
            $status = $menu->fill($data)->save();
            if ($status){
                return redirect()->route('menu.index')->with('success','Menu has been updated successfully');
            }
            else{
                return back()->with('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }


    public function destroy($id)
    {
        $menu = Menu::find($id);
        if ($menu){
            $status = $menu->delete();
            if ($status){
                return redirect()->route('menu.index')->with('errors','Menu successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
