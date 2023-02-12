<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Models;
use App\Models\ModelYear;
use App\Models\UserVeichle;
use FunctionOrMethodName;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
   public function index()
   {
      $brands = Brand::all();
      $vehicles = 0;
      $vehicles = UserVeichle::with('brand', 'model', 'year')->where('status', 1)->where('user_id', auth()->user()->id)->get();
      return view('frontend.user.vehicle.index', compact('brands', 'vehicles'));
   }
   public function store(Request $request)
   {
    
      $request->validate([
         'vehicle_brand' => 'required',
         'vehicle_model' => 'required',
         'vehicle_year' => 'required|not_in:0',
         'defaultVehicle' => 'required',
      ]);
      $vehicle = new UserVeichle;
      $vehicle->user_id = auth()->user()->id;
      $vehicle->brand_id = $request->vehicle_brand;
      $vehicle->model_id = $request->vehicle_model;
      $vehicle->year_id = $request->vehicle_year;
      $vehicle->default_vehicle = $request->defaultVehicle;
      if($request->defaultVehicle){
         UserVeichle::where('user_id', auth()->user()->id)->update([
            'default_vehicle' => 0
         ]);
      }
      if ($vehicle->save()) {
         flash(translate('Information has been inserted successfully'))->success();
      } else {
         flash(translate('Error Happens, Please Try Again'))->error();
      }
      return redirect()->back();
   }
   public function default($id)
   {
      UserVeichle::where('user_id', auth()->user()->id)->update([
         'default_vehicle' => 0
      ]);
      UserVeichle::where('id', $id)->update([
         'default_vehicle'=>1
      ]);
      flash(translate('Default Vehicle Updated successfully'))->success();
      return redirect()->back();
   }
   public function delete($id)
   {
      UserVeichle::find($id)->delete();
      return redirect()->back()->with('warning', 'Data Has Been Deleted Successfully');
   }
}
