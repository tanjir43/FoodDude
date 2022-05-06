<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\Menu\CreateVariationRequest;
use App\Models\Restaurant\Menu;
use App\Models\Restaurant\Variation;
use Illuminate\Http\Request;
class VariationController extends Controller
{

    public function index()
    {
        $restaurant = auth('restaurant')->user()->id;

        $verities =Variation::where('restaurant_id',$restaurant)->get();

        return view('backend.restaurant.verity.index',compact('verities'));
    }

    public function create()
    {
        $restaurant = auth('restaurant')->user()->id;

        $menus      = Menu::where('restaurant_id',$restaurant)->get();

        return view('backend.restaurant.verity.create',compact('menus'));
    }


    public function store(CreateVariationRequest $request)
    {
        $data = $request->all();
        $status = Variation::create($data);
        if ($status){
            return redirect()->route('verity.index')->with('success','Verity created successfully');
        }else{
            return back()->with('errors','Something went wrong');
        }

    }


    public function show(Variation $variation)
    {
        //
    }


    public function edit($id)
    {
        $restaurant = auth('restaurant')->user()->id;

        $menus      = Menu::where('restaurant_id',$restaurant)->get();
        $verity= Variation::find($id);
        return view('backend.restaurant.verity.edit',compact(['verity','menus']));
    }


    public function update(Request $request, $id)
    {
        $verity = Variation::find($id);
        if ($verity){
            $data       = $request->all();
            $status = $verity->fill($data)->save();
            if ($status){
                return redirect()->route('verity.index')->with('success','Verity has been updated successfully');
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
        $verity = Variation::find($id);
        if ($verity){
            $status = $verity->delete();
            if ($status){
                return redirect()->route('verity.index')->with('errors','Verity successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
