<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Mechanic;
use App\Models\MechanicBrand;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MechanicController extends Controller
{
    public function register(Request $request){
        return view('frontend.mechanic.register');
    }
    public function home(){
        $profile = Mechanic::with('user','brands')->where('user_id', auth()->user()->id)->first();
        $all_brands = Brand::all();
        $user = Auth::user();
        $details = Mechanic::where('user_id', auth()->user()->id)->get();
        return view('frontend.mechanic.home', compact('user', 'details', 'profile', 'all_brands'));      
    }
    public function info_store(Request $request, Mechanic $mechanic){
        $validated = $request->validate([
            'name' => 'required|max:50',
            'contact' => 'required|max:50',
            'city' => 'required|max:50',
            'country' => 'required|max:50',
            'address_one' => 'required|max:150',
            'address_two' => 'max:150',
            'description' => 'required|max:200',
        ],[
            'address_one.required' => 'The Primary Address is Required.',
            'address_one.max' => 'The Primary Address max will be :max Characters.',
            'address_two.max' => 'The Secondary Address max will be :max Characters.',
            'description.required' => 'The Description is Required.',
            'description.max' => 'The Description max will be :max Characters.',
            'required' => 'The :attribute is Required.',
            'max' => 'The :attribute max will be :max Characters.',
        ]);
       
      $mechanic = Mechanic::where('user_id', Auth::id())->get();
        if(count($mechanic)){
            flash(translate('You Can Update Your Information'))->success();
            flash(translate('Information Already Exists'))->error();
            return redirect()->route('mechanic.home');
        }else{
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
                return redirect()->route('mechanic.list');
            }
        
    }
    public function list(){
        $mechanics = Mechanic::with('user')->where('status', 1)->get();
        return view('frontend.mechanic.list',compact('mechanics'));
    }
    public function search(Request $request){
        $queary = $request->name;
        $mechanics = Mechanic::where('city', 'LIKE', "%$request->name%")
                                ->orWhere('address', 'LIKE', "%$request->name%")
                                ->orWhere('country', 'LIKE', "%$request->name%")
                                ->orWhere('address_two', 'LIKE', "%$request->name%")
                                ->orWhereHas('brands',  function ($q) use ($queary){
                                    $q->where('name', 'like', '%' . $queary . '%');
                                })
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
    public function public_profile($id){
        $profile = Mechanic::with('user','brands')->where('id', $id)->first();
        $all_brands = Brand::all();
        return view('frontend.mechanic.public_profile', compact('profile','all_brands'));
    }
    public function mechanic_update(Request $request, Mechanic $mechanic){
        // return $request;
        $validated = $request->validate([
            'name' => 'required|max:50',
            'contact' => 'required|max:50',
            'city' => 'required|max:50',
            'country' => 'required|max:50',
            'address_one' => 'required|max:150',
            'address_two' => 'max:150',
            'description' => 'required|max:200',
        ],[
            'address_one.required' => 'The Primary Address is Required.',
            'address_one.max' => 'The Primary Address max will be :max Characters.',
            'address_two.max' => 'The Secondary Address max will be :max Characters.',
            'description.required' => 'The Description is Required.',
            'description.max' => 'The Description max will be :max Characters.',
            'required' => 'The :attribute is Required.',
            'max' => 'The :attribute max will be :max Characters.',
        ]);
       
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
    public function password(Request $request){

        $profile = Mechanic::with('user','brands')->where('user_id', auth()->user()->id)->first();
        $all_brands = Brand::all();
        $user = Auth::user();
        return view('frontend.mechanic.password', compact('user', 'profile', 'all_brands'));
    }
    public function passwordUpdate(Request $request){
        if ($request->new_password != null && ($request->new_password == $request->confirm_password)) {
            User::where('id', Auth::id())->update([
                'password'=>Hash::make($request->new_password)
            ]);
        }else{
            flash(translate('Password Did not match!'))->warning();
            return back();
        }
        flash(translate('Your Profile has been updated successfully!'))->success();
        return back();
    }
    public function test(){
        $profile = Mechanic::with('user','brands')->where('user_id', auth()->user()->id)->first();
        $all_brands = Brand::all();
        $user = Auth::user();
        return view('frontend.mechanic.test', compact('user', 'profile', 'all_brands'));
    }
    
}
