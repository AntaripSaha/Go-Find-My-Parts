<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    public function index(Request $request){
        $sort_search =null;
        $advertises = Advertise::orderBy('id', 'desc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $advertises = $advertises->where('name', 'like', '%'.$sort_search.'%');
        }
        $advertises = $advertises->paginate(5);
        return view('backend.product.advertisement.index', compact('advertises', 'sort_search'));
    }
    public function store(Request $request)
    {
        $advertises = new Advertise;
        $advertises->name = $request->name;
        $advertises->image = $request->logo;
        $advertises->section = $request->section;
        $advertises->url = $request->url;
        $advertises->save();
        flash(translate('Brand has been inserted successfully'))->success();
        return redirect()->route('advertise.index');
    }
    public function update($id){
     
        $advertise = Advertise::where('id', $id)->get();
        return view('backend.product.advertisement.edit',compact('advertise'));
    }



    
       
       public function update_store($id, Request $request){
        Advertise::where('id', $id)->update([
                'model_name'=> $request->model_name,
                'brand_id'=> $request->brand_id,
        ]);
    
            flash(translate('Model has been Updated successfully'))->success();
            return redirect()->route('model.index');
       }
       public function delete($id){
        Advertise::where('id', $id)->delete();
        flash(translate('Model has been Deleted successfully'))->warning();
        return redirect()->route('model.index');
       }
}
