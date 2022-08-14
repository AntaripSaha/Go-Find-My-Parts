<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    public function register(Request $request){
        return view('frontend.mechanic.register');
    }
    public function home(){
        return view('frontend.mechanic.home');
    }
    public function info_store(Request $request){
        $mechanic = Mechanic::where('id', auth()->user->id)->select('id')->get();
        if($mechanic != 0){
            $mechanic = new Mechanic();
            $mechanic->name = $request->name;
            $mechanic->address = $request->address;
            $mechanic->contact = $request->contact;
            $mechanic->image = $request->image;
            if($mechanic->save()){
                flash(translate('Information has been inserted successfully'))->success();
                return redirect()->route('mechanic.list');
            }
            return view('frontend.mechanic.home');

        }else{
            flash(translate('User Already Exists'))->success();
                return redirect()->route('mechanic.home');
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
