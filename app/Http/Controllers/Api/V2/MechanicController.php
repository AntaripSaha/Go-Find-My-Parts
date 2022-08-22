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
                $queary = $request->searchKey;
                $mechanic = Mechanic::where('city', 'LIKE', "%$request->searchKey%")
                                    ->orWhere('address', 'LIKE', "%$request->searchKey%")
                                    ->orWhere('country', 'LIKE', "%$request->searchKey%")
                                    ->orWhere('address_two', 'LIKE', "%$request->searchKey%")
                                    ->orWhereHas('brands',  function ($q) use ($queary){
                                        $q->where('name', 'like', '%' . $queary . '%');
                                    })
                                    ->get();
                return response()->json([
                    'data'=>$mechanic->map(
                        function($data){
                            return [
                                'profile_image' => uploaded_asset($data->profile_image),   
                                'banner_image' => uploaded_asset($data->banner_image),   
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
                                'profile_image' => uploaded_asset($data->profile_image),   
                                'banner_image' => uploaded_asset($data->banner_image),   
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
