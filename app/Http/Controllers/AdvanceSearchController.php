<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Models;
use App\Models\Style;
use App\Models\Year;
use DB;
use Illuminate\Http\Request;

class AdvanceSearchController extends Controller
{
    public function style_index(Request $request){
        $sort_search =null;
        $years = Year::all();
        $brands = Brand::all();
        $styles = Style::all();
        $models = Models::where('id', $styles->model_id)->select('id', 'model_name')->get();
        $models = Models::where('id', $styles->model_id)->select('id', 'model_name')->get();

        if ($request->has('search')){
            $sort_search = $request->search;
            $models = $models->where('name', 'like', '%'.$sort_search.'%')
                             ->orWhere('model_name','like', '%'.$sort_search.'%');
        }
        $models = $models->paginate(5);
        return view('backend.product.styles.style', compact('models', 'brands', 'sort_search', 'years'));
    }
}
