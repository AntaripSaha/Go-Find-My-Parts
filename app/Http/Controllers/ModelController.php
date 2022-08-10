<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models;
use App\Models\Brand;
use DB;


class ModelController extends Controller
{
   public function index(Request $request){
    $sort_search =null;
    $brands = Brand::all();
    $models = DB::table('brands')
                ->rightJoin('models', 'models.brand_id', '=', 'brands.id')
                ->orderBy('model_name', 'asc');
    if ($request->has('search')){
        $sort_search = $request->search;
        $models = $models->where('name', 'like', '%'.$sort_search.'%')
                         ->orWhere('model_name','like', '%'.$sort_search.'%');
    }
    $models = $models->paginate(5);
    return view('backend.product.models.model',compact('models','sort_search', 'brands'));
   }
   public function store(Request $request){
    $models = new Models;
    $models->model_name = $request->model_name;
    $models->brand_id = $request->brand_id;
    if($models->save()){
        flash(translate('Model has been inserted successfully'))->success();
        return redirect()->route('model.index');
    }
   }
   public function update($id){
    $brands = Brand::all();
    $model = Models::where('id', $id)->get();
    return view('backend.product.models.edit',compact('model','brands'));
   }
   public function update_store($id, Request $request){
    Models::where('id', $id)->update([
            'model_name'=> $request->model_name,
            'brand_id'=> $request->brand_id,
    ]);
        flash(translate('Model has been Updated successfully'))->success();
        return redirect()->route('model.index');
   }
   public function delete($id){
    Models::where('id', $id)->delete();
    flash(translate('Model has been Deleted successfully'))->warning();
    return redirect()->route('model.index');
   }
}
