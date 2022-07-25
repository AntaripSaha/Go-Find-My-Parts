<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DependancySearchController extends Controller
{
    public function brand()
    {
        $brand= DB::table("brands")->get();
        return view('home')->with('brands',$brand);
    }
    
    //For fetching states
    public function model($id)
    {
        $models = DB::table("models")
                    ->where("model_id",$id)
                    ->pluck("year","id");
        return response()->json($models);
    }
    
    //For fetching cities
    public function getCities($id)
    {
        $cities= DB::table("cities")
                    ->where("state_id",$id)
                    ->pluck("name","id");
        return response()->json($cities);
    }
    public function getVillage($id)
    {
        
        $village= DB::table("villages")
                    ->where("city_id",$id)
                    ->pluck("name","id");
        return response()->json($village);
    }
}
