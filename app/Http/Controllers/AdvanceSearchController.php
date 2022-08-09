<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Models;
use App\Models\Style;
use App\Models\Year;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdvanceSearchController extends Controller
{
    public function style_index(Request $request){
        $sort_search =null;
        $years = Year::select('id', 'year')->get();
        $brands = Brand::select('id','name')->get();
        $models = Models::select('id', 'model_name')->get();
        $styles = Style::with('brands', 'models', 'years');
        if ($request->has('search')){
            $sort_search = $request->search;
            $styles = $styles->where('style', 'like', '%'.$sort_search.'%');
        }
        $styles = $styles->paginate(5);
        return view('backend.product.styles.style', compact('styles','models', 'brands', 'sort_search', 'years'));
    }
    public function style_store(Request $request){
        $styles = new Style();
        $styles->style = $request->style;
        $styles->brand_id = $request->brand_id;
        $styles->model_id = $request->model_id;
        $styles->year_id = $request->year_id;
        if($styles->save()){
            flash(translate('Style has been inserted successfully'))->success();
            return redirect()->route('style.index');
        }
    }
}
