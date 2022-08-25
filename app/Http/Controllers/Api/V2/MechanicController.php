<?php

namespace App\Http\Controllers\Api\V2;

use App\Http\Controllers\Controller;
use App\Http\Resources\V2\MechanicCollection;
use App\Http\Resources\V2\MechanicResource;
use App\Http\Resources\V2\MechanicResourceCollection;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function list(Request $request){
        try {
            if($request->searchKey){
                $queary = $request->searchKey;
                $mechanic = Mechanic::with('user')
                                    ->where('status', 1)
                                    ->where('city', 'LIKE', "%$request->searchKey%")
                                    ->orWhere('address', 'LIKE', "%$request->searchKey%")
                                    ->orWhere('country', 'LIKE', "%$request->searchKey%")
                                    ->orWhere('address_two', 'LIKE', "%$request->searchKey%")
                                    ->orWhereHas('brands',  function ($q) use ($queary){
                                        $q->where('name', 'like', '%' . $queary . '%');
                                    })
                                    ->paginate(20);
                return new MechanicResource($mechanic);
            }else{
                $mechanic = Mechanic::with('user')
                                    ->where('status', 1)
                                    ->paginate(20);
                return new MechanicResource($mechanic);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>404,
                'message'=> $th->getMessage()
            ]);
        }
    }
    public function details(Request $request){
        try {
            $mechanic = Mechanic::with('user')->where('status', 1)->where('id', $request->Id)->first();
            return new MechanicCollection($mechanic);
        } catch (\Throwable $th) {
            return response()->json([
                'status'=>404,
                'message'=> $th->getMessage()
            ]);
        }
    }
}
