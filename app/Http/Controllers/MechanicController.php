<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Mechanic;
use App\Models\MechanicBrand;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MechanicController extends Controller
{
    public function register(Request $request){
        return view('frontend.mechanic.register');
    }
    public function home(){
        $user = User::where('id', auth()->user()->id)->select('name')->get();
        $details = Mechanic::where('user_id', auth()->user()->id)->get();
        return view('frontend.mechanic.home', compact('user', 'details'));      
    }
    public function info_store(Request $request){
      $mechanic = Mechanic::where('user_id', Auth::id())->get();
        if(count($mechanic)){
            flash(translate('You Can Update Your Information'))->success();
            flash(translate('Information Already Exists'))->error();
            return redirect()->route('mechanic.home');
        }else{
            $mechanic = new Mechanic();
            $mechanic->user_id = Auth::id();
            $mechanic->address = $request->address_one;
            $mechanic->address_two = $request->address_two;
            $mechanic->city = $request->city;
            $mechanic->country = $request->country;
            $mechanic->contact = $request->contact;
            $mechanic->banner_image = $request->banner_image;
            $mechanic->profile_image = $request->profile_image;
            $mechanic->description = $request->description;
            if($mechanic->save()){
                User::where('id', Auth::id())->update([
                    'name'=>$request->name
                ]);
                flash(translate('Information has been inserted successfully'))->success();
                return redirect()->route('mechanic.list');
            }
        }
    }
    public function list(){
        $mechanics = Mechanic::where('status', 1)->get();
        return view('frontend.mechanic.list',compact('mechanics'));
    }
    public function search(Request $request){
      $mechanics = Mechanic::where('name', 'LIKE', "%$request->name%")
                                ->orWhere('address', 'LIKE', "%$request->name%")
                                ->get();
        return view('frontend.mechanic.list',compact('mechanics'));
    }
    public function profile(){
        $profile = Mechanic::with('user','brands')->where('user_id', auth()->user()->id)->first();
        $all_brands = Brand::all();
        return view('frontend.mechanic.profile', compact('profile','all_brands'));
    }
    public function dashboard(){
        $profile = Mechanic::with('user','brands')->where('user_id', auth()->user()->id)->first();
        $all_brands = Brand::all();
        return view('frontend.mechanic.dashboard', compact('profile','all_brands'));
    }
    public function mechanic_update(Request $request, Mechanic $mechanic){
        $mechanic->banner_image= $request->banner_image;
        $mechanic->profile_image= $request->profile_image;
        $mechanic->contact= $request->contact;
        $mechanic->address= $request->address_one;
        $mechanic->address_two= $request->address_two;
        $mechanic->city= $request->city;
        $mechanic->country= $request->country;
        $mechanic->description= $request->description;
        $mechanic->save();
        $mechanic->brands()->sync($request->brands);
        if($request->name){
            User::where('id', Auth::id())->update([
                'name'=>$request->name
            ]);
        }
        flash(translate('Information has been inserted successfully'))->success();
        return redirect()->route('mechanic.profile');
    }
}
