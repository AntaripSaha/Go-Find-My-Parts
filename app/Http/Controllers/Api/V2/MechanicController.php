<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function index(Request $request){
        try {
            if($request->searchKey){
                $mechanic = Mechanic::where('name','LIKE',"%$request->searchKey%")
                                    ->orWhere('address', 'LIKE', "%$request->searchKey%")
                                    ->get();
                return response()->json([
                    'data'=>$mechanic->map(
                        function($data){
                            return [
                                'image' => uploaded_asset($data->image),   
                                'mechanic' =>$data ,
                            ];
                        }
                    ),
                    'status'=>200
                ]);
            }else{
                $mechanic = Mechanic::where('status', 1)->get();
                return response()->json([
                    'data'=>$mechanic->map(
                        function($data){
                            return [
                                'image' => uploaded_asset($data->image),   
                                'mechanic' =>$data ,
                            ];
                        }
                    ),
                    'status'=>200
                ]);
            }
              
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>404,
                'message'=> $th->getMessage()
            ]);
        }
    }
}
