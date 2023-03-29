<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class brandController extends Controller
{
    //add brand
    function brand(){
        return view('admin.brand.add_brand');
    }

    // brand store
    function brand_store(Request $request){
        $request->validate([
            'brand_name'=>'required',
            'brand_img'=>'required',
        ]);

        $brand_id = brand::insertGetId([
            'brand_name'=>$request->brand_name,
            'created_at'=>Carbon::now(),
        ]);

        $brand_img = $request->brand_img;
        $extention = $brand_img->getClientOriginalExtension();
        $file_name = $request->brand_name.'-'.rand(100000,999999).'.'.$extention;
        Image::make($brand_img)->save(public_path('uplode/brand/'. $file_name));

        brand::find($brand_id)->update([
            'brand_img'=>$file_name,
        ]);
        return back()->with('success', 'Brand Add Successfully');
    }

    // brand list
    function brand_list(){
        $brands = brand::all();
        return view('admin.brand.brand_list', [
            'brands'=>$brands,
        ]);
    }

    // brand delete
    function brand_delete($brand_id){
        $brand_image = brand::find($brand_id)->brand_img;
        $brand_img_del = public_path('uplode/brand/'.$brand_image);
        unlink($brand_img_del);

        brand::find($brand_id)->delete();
        return back()->with('branddel', 'Brand Delete Successfully');
    }
}
