<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class subcategoryController extends Controller
{
    //subcategory view
    function subcategory(){
        $categorys = category::all();
        return view('admin.subcategory.subcategory', [
            'categorys'=>$categorys,
        ]);
    }

    // subcategory store
    function subcategory_store(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name'=>'required',
            'subcategory_img'=>'required',
            'subcategory_icon'=>'required',
        ]);

        $subcat_id = subcategory::insertGetId([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_icon'=>$request->subcategory_icon,
            'created_at'=>Carbon::now(),
        ]);

        $subcat_img = $request->subcategory_img;
        $extention = $subcat_img->getClientOriginalExtension();
        $file_name = Str::lower(str_replace(' ','-', $request->subcategory_name)).'-'.rand(100000, 999999).'.'.$extention;
        Image::make($subcat_img)->save(public_path('uplode/subcategory/'. $file_name));

        subcategory::find($subcat_id)->update([
            'subcategory_img'=>$file_name,
        ]);

        return back()->with('subsuccess', 'SubCategory Add Successfully');
    }


    // subcategory list
    function subcategory_list(){
        $subcategorys = subcategory::all();
        return view('admin.subcategory.subcategory_list', [
            'subcategorys'=>$subcategorys,
        ]);
    }

    // subcategory delete
    function subcategory_delete($subcategory_id){
        $image = subcategory::where('id', $subcategory_id)->first()->subcategory_img;
        $image_delete = public_path('uplode/subcategory/'. $image);
        unlink($image_delete);

        subcategory::find($subcategory_id)->delete();
        return back()->with('subdelete', 'Subcategory Delete Successfully');
    }

    //subcategory update
    function subcategory_update($subcategory_id){
        $categorys = category::all();
        $subcategorys = subcategory::find($subcategory_id);
        return view('admin.subcategory.subcategory_update', [
            'categorys'=>$categorys,
            'subcategorys'=>$subcategorys,
        ]);
    }

    // subcategory edit
    function subcategory_edit(Request $request){
        if($request->subcategory_img == ''){
            subcategory::find($request->subcategory_id)->update([
                'category_id'=>$request->category_id,
                'subcategory_name'=>$request->subcategory_name,
                'subcategory_icon'=>$request->subcategory_icon,
            ]);
            return back()->with('subup', 'Subcategory Update Successfully');
        }
        else{
            $image = subcategory::where('id', $request->subcategory_id)->first()->subcategory_img;
            $image_delete = public_path('uplode/subcategory/'. $image);
            unlink($image_delete);

            $sub_cat_img = $request->subcategory_img;
            $extention = $sub_cat_img->getClientOriginalExtension();
            $file_name = Str::lower(str_replace(' ','-', $request->subcategory_name)).'-'.rand(100000, 999999).'.'.$extention;
            Image::make($sub_cat_img)->save(public_path('uplode/subcategory/'.$file_name));

            subcategory::find($request->subcategory_id)->update([
                'category_id'=>$request->category_id,
                'subcategory_name'=>$request->subcategory_name,
                'subcategory_img'=>$file_name,
                'subcategory_icon'=>$request->subcategory_icon,
            ]);
            return back()->with('subup', 'Subcategory Update Successfully');
        }

    }
}
