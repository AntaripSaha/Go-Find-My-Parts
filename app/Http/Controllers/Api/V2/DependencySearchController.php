<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Models;
use App\Models\Product;
use App\Models\Year;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class DependencySearchController extends Controller
{
    //Basic Search Start
    public function brand(){
        try {
            $brand = Brand::select('id', 'name')->get();
            $brand_count = Brand::select('id', 'name')->count();
            return response()->json([
                'total'=>$brand_count,
                'data'=>$brand,
                'status'=>200,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status'=>404,
                'message'=> $e->getMessage()
            ]);
        }
    }
    public function model(Request $request){
        try {
            $model = Models::where('brand_id', $request->id)->select('id', 'model_name')->get();
            return response()->json([
                'data'=>$model,
                'status'=>200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>404,
                'message'=> $th->getMessage()
            ]);
        }
    }
    public function year(){
        try {
            $year = Year::select('id', 'year')->get();
            return response()->json([
                'data'=>$year,
                'status'=>200
            ]);        
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>404,
                'message'=> $th->getMessage()
            ]);
        }
    }
    public function chassis(Request $request){
        try {
            $chassis = Product::where('brand_id', $request->brandId)
                                ->where('model_id', $request->modelId)
                                ->where('year_id', $request->yearId)
                                ->get();
            return response()->json([
                'data'=>$chassis,
                'status'=>200
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>404,
                'message'=>'No Data Available'
            ]);
        }
    }
    //Basic Search End
}
