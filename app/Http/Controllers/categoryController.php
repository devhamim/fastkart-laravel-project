<?php

namespace App\Http\Controllers;

use App\Models\category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class categoryController extends Controller
{
    //add category view
    function add_category(){
        return view('admin.category.add_category');
    }

    // category store
    function store_category(Request $request){
        $request->validate([
            '*'=>'required',
        ]);


        $category_id =  category::insertGetId([
            'category_name'=>$request->category_name,
            'category_icon'=>$request->category_icon,
            'created_at'=>Carbon::now(),
        ]);

        $cat_img = $request->category_img;
        $extention = $cat_img->getClientOriginalExtension();
        $file_name = Str::random(3).rand(999,9999).'.'.$extention;
        Image::make($cat_img)->save(public_path('uplode/category/'. $file_name));

        category::find($category_id)->update([
            'category_img'=>$file_name,
        ]);
        return back()->with('success', 'Category Add Successfully');
    }

    // category list
    function category_list(){
        $categorys = category::all();
        return view('admin.category.category_list', [
            'categorys'=>$categorys,
        ]);
    }

    // category delete
    function category_delete($category_id){
        $cat_img = category::where('id', $category_id)->first()->category_img;
        $cat_img_delete = public_path('uplode/category/'. $cat_img);
        unlink($cat_img_delete);

        category::find($category_id)->delete();
        return back()->with('catdelete', 'Category Delete Successfully');
    }

    // category update
    function category_update($category_id){
        $category_info =  category::find($category_id);
        return view('admin.category.category_update', [
            'category_info'=>$category_info,
        ]);
    }

    // category edit
    function category_edit(Request $request){
        if($request->category_img == ''){
            category::find($request->category_id)->update([
                'category_name'=>$request->category_name,
                'category_icon'=>$request->category_icon,
            ]);
            return back()->with('cat_up', 'Category Update Successfully');
        }
        else{
            $cat_img = category::where('id', $request->category_id)->first()->category_img;
            $cat_delete = public_path('uplode/category/'.$cat_img);
            unlink($cat_delete);

            $cat_img_up = $request->category_img;
            $extention = $cat_img_up->getClientOriginalExtension();
            $file_name = Str::lower(str_replace(' ', '-', $request->category_name)).'-'. rand(100000,999999).'.'.$extention;
            Image::make($cat_img_up)->save(public_path('uplode/category/'. $file_name));

            category::find($request->category_id)->update([
                'category_name'=>$request->category_name,
                'category_img'=>$file_name,
                'category_icon'=>$request->category_icon,
            ]);
            return back()->with('cat_up', 'Category Update Successfully');
        }
    }

}
