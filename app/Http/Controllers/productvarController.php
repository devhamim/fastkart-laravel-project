<?php

namespace App\Http\Controllers;

use App\Models\productColor;
use App\Models\ProductSize;
use App\Models\productSizeN;
use Carbon\Carbon;
use Illuminate\Http\Request;

class productvarController extends Controller
{
    //product var
    function product_var(){
        $colors = productColor::all();
        $sizes = ProductSize::all();
        $sizeNumber = productSizeN::all();
        return view('admin.product.product_var', [
            'colors'=>$colors,
            'sizes'=>$sizes,
            'sizeNumber'=>$sizeNumber,
        ]);
    }

    // product Color
    function color_store(Request $request){
        $request->validate([
            '*'=>'required',
        ]);

        productColor::insert([
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Color Add Successfully');
    }

    // product size
    function size_store(Request $request){
        $request->validate([
            'size_name'=>'required',
        ]);
        ProductSize::insert([
            'size_name'=>$request->size_name,
            'quantity'=>$request->quantity,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('sizsuccess', 'Size Add Successfully');
    }
    // product size
    function size_number_store(Request $request){
        $request->validate([
            'size_number'=>'required',
        ]);
        productSizeN::insert([
            'size_number'=>$request->size_number,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('sizsnuccess', 'Size Number Add Successfully');
    }

    // color delete
    function color_delete($color_id){
        productColor::find($color_id)->delete();
        return back()->with('colordel', 'color Delete Successfully');
    }

    // size delete
    function size_delete($size_id){
        ProductSize::find($size_id)->delete();
        return back()->with('sizedel', 'Size Delete Successfully');
    }

    // size delete
    function sizen_delete($sizen_id){
        productSizeN::find($sizen_id)->delete();
        return back()->with('sizendel', 'Size Delete Successfully');
    }
}
