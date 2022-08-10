<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Models;
use App\Models\PartCategory;
use App\Models\Style;
use App\Models\Year;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class AdvanceSearchController extends Controller
{
    // Style Start
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
    public function style_update($id){
        $styles = Style::find($id);
        $brands = Brand::select('id','name')->get();
        $models = Models::select('id','model_name')->get();
        $years = Year::select('id','year')->get();
        return view('backend.product.styles.edit', compact('styles','brands','models','years' ));
    }
    public function style_update_store($id,Request $request){
        Style::where('id', $id)->update([
            'style'=>$request->style,
            'brand_id'=>$request->brand_id,
            'model_id'=>$request->model_id,
            'year_id'=>$request->year_id
        ]);
        flash(translate('Style has been Updated successfully'))->success();
        return redirect()->route('style.index');
    }
    // Style End

    // Part Category Start
    public function part_index(Request $request){
        $part_categories = PartCategory::orderBy('id', 'asc');
        if ($request->has('search')){
            $sort_search = $request->search;
            $part_categories = $part_categories->where('name', 'like', '%'.$sort_search.'%');
        }
       $part_categories = $part_categories->paginate(5);
        return view('backend.product.part_category.index', compact('part_categories'));
    }
    public function part_store(Request $request){
        $part_categories = new PartCategory();
        $part_categories->name = $request->part_category;
        if($part_categories->save()){
            flash(translate('Part Category has been inserted successfully'))->success();
            return redirect()->route('part.categories.index');
        }
    }
    public function part_category_update($id, Request $request){
       $part_categories = PartCategory::find($id);
        return view('backend.product.part_category.edit', compact('part_categories'));
    }
    public function part_category_update_store($id, Request $request){
        PartCategory::where('id', $id)->update([
            'name'=>$request->name
        ]);
        flash(translate('Category has been Updated successfully'))->success();
        return redirect()->route('part.categories.index');
    }
    // Part Category End
}
