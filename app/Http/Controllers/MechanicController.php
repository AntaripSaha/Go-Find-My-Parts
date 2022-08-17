<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Models\User;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function register(Request $request){
        return view('frontend.mechanic.register');
    }
    public function home(){
        // $user = User::where('id', auth()->user()->id)->select('name')->get();
        return view('frontend.mechanic.home');
    }
    public function info_store(Request $request){
      $mechanic = Mechanic::where('user_id', auth()->user()->id)->select('id')->get();
        if($mechanic){
            flash(translate('You Can Update Your Information'))->success();
            flash(translate('Information Already Exists'))->error();
            return redirect()->route('mechanic.home');
        }else{
            $mechanic = new Mechanic();
            $mechanic->name = $request->name;
            $mechanic->user_id = $request->auth()->user()->id;
            $mechanic->address = $request->address;
            $mechanic->contact = $request->contact;
            $mechanic->image = $request->image;
            if($mechanic->save()){
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
}
