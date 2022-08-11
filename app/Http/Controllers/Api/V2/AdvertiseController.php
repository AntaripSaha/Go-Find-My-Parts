<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use Illuminate\Http\Request;

class AdvertiseController extends Controller
{
    public function advertise(){
        try {
            $advertise = Advertise::all();
            return response()->json([
                'data'=>$advertise->map(
                    function($data){
                        return [
                            'thumbnail_image' => uploaded_asset($data->image),   
                            'product' =>$data ,
                        ];
                    }
                ),
                'status'=>200
            ]);
           
        } catch (\Throwable $e) {
            return response()->json([
                'status'=>404,
                'message'=> $e->getMessage()
            ]);
        }

    }

}
