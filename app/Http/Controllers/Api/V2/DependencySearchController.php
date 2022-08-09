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
            if($request->productId > 0){
                $product = Product::where('id', $request->productId)->get();
                return response()->json([
                    'data'=>$product,
                    'status'=>200
                ]);
            }else{
                if($request->yearId > 0 && $request->modelId == 0){
                    $products = Product::where('brand_id', $request->brandId)
                                        ->where('model_id', $request->modelId)
                                        ->where('year_id', $request->yearlId)
                                        ->select('chassis_id', 'id')
                                        ->get();
                    return response()->json([
                        'data'=>$products,
                        'status'=>200
                    ]);
                }
                elseif($request->brandId > 0 && $request->modelId == 0){
                    $products = Product::where('brand_id', $request->brandId)->get();
                    return response()->json([
                        'data'=>$products,
                        'status'=>200
                    ]);
                }
                elseif($request->modelId > 0 && $request->yearId == 0){
                    $products = Product::where('model_id', $request->modelId)
                                        ->where('brand_id', $request->brandId)
                                        ->get();
                    return response()->json([
                        'data'=>$products,
                        'status'=>200
                    ]);
                }
                elseif($request->yearId > 0 && $request->modelId > 0){
                    $products = Product::where('brand_id', $request->brandId)
                                        ->where('model_id', $request->modelId)
                                        ->where('year_id', $request->yearId)
                                        ->get();
                    return response()->json([
                        'data'=>$products,
                        'status'=>200
                    ]);
                }else{
                    return response()->json([
                        'status'=>404,
                        'message'=>'No Data Available'
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>404,
                'message'=>'No Data Available'
            ]);
        }
    }
    //Basic Search End
}
