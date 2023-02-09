<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
   public function vehicle_list(){
    
    return view ('frontend.user.vehicle.index');
   }
}
