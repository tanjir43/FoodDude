<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\CreateTableRequest;
use App\Http\Requests\Restaurant\EditTableRequest;
use App\Models\Restaurant;
use App\Models\Restaurant\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TableController extends Controller
{

    public function index()
    {
        $restaurant = auth('restaurant')->user()->id;
        $tables     = Table::where('restaurant_id',$restaurant)->get();
        return view('backend.restaurant.reservation.table.index',compact('tables'));
    }

    public function tableStatus(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('tables')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('tables')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => 'Successfully updated status', 'status' => true]);
    }

    public function create()
    {
        $restaurant = auth('restaurant')->user()->id;
        $hours      = Restaurant\Hour::where('restaurant_id',$restaurant)->where('status','active')->get();
        $dates      = Restaurant\Date::where('restaurant_id',$restaurant)->where('status','active')->get();
        return view('backend.restaurant.reservation.table.create',compact(['restaurant','hours','dates']));
    }

    public function store(Request $request)
    {
        $data       = $request->all();
        $slug       =Str::slug($request->input('title'));
        $slug_count =  Table::where('slug',$slug)->count();
        if ($slug_count>0){
            $slug   = rand(1,100).$slug;
        }
        $data['slug'] = $slug;
        $status = Table::create($data);
        if ($status){
            return redirect()->route('table.index')->with('success','Table created successfully');
        }
        else{
            return back()->with('errors','Something went wrong');
        }
    }


    public function show(Table $table)
    {
        //
    }


    public function edit($id)
    {
        $table = Table::find($id);
        $restaurant = auth('restaurant')->user()->id;
        $hours      = Restaurant\Hour::where('restaurant_id',$restaurant)->where('status','active')->get();
        $dates      = Restaurant\Date::where('restaurant_id',$restaurant)->where('status','active')->get();
        return view('backend.restaurant.reservation.table.edit',compact('table','hours','dates'));
    }



    public function update(EditTableRequest $request, $id)
    {
        $table = Table::find($id);
            $data       = $request->all();
            $status = $table->fill($data)->save();
            if ($status){
                return redirect()->route('table.index')->with('success','Table updated successfully');
            }
        else{
            return back()->with('errors','Data not found');
        }
    }


    public function destroy($id)
    {
        $table = Table::find($id);
        if ($table){
            $status = $table->delete();
            if ($status){
                return redirect()->route('table.index')->with('success','Table successfully deleted');
            }else{
                return back('errors','Something went wrong');
            }
        }else{
            return back()->with('errors','Data not found');
        }
    }
}
