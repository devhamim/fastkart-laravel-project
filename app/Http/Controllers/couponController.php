<?php

namespace App\Http\Controllers;

use App\Models\coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class couponController extends Controller
{
    //coupon
    function coupon(){
        $coupons = coupon::all();
        return view('admin.coupon.coupon', [
            'coupons'=>$coupons,
        ]);
    }

    // coupon store
    function coupon_store(Request $request){
        $request->validate([
            'discount'=>'required',
            'coupon_code'=>'required',
            'expiry_date'=>'required',
        ]);

        if($request->coupon_img == ''){
            coupon::insert([
                'discount'=>$request->discount,
                'coupon_code'=>$request->coupon_code,
                'coupon_titel'=>$request->coupon_titel,
                'expiry_date'=>$request->expiry_date,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('success', 'Coupon Add Successfully');
        }
        else{
            $coupon_img = $request->coupon_img;
            $extention = $coupon_img->getClientOriginalExtension();
            $file_name = $request->coupon_code.'-'.rand(1000,9999).'.'.$extention;
            Image::make($coupon_img)->save(public_path('uplode/coupon/'. $file_name));

            coupon::insert([
                'discount'=>$request->discount,
                'coupon_code'=>$request->coupon_code,
                'coupon_titel'=>$request->coupon_titel,
                'coupon_img'=>$file_name,
                'expiry_date'=>$request->expiry_date,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('success', 'Coupon Add Successfully');
        }

    }

    // coupon delete
    function coupon_delete($coupon_id){
        if(coupon::where('id', $coupon_id)->first()->coupon_img == null){
            coupon::find($coupon_id)->delete();
            return back()->with('delete', 'Coupon Delete Successfully');
        }
        else{
            $coupon_image = coupon::where('id', $coupon_id)->first()->coupon_img;
            $coupon_img_del = public_path('uplode/coupon/'. $coupon_image);
            unlink($coupon_img_del);

            coupon::find($coupon_id)->delete();
            return back()->with('delete', 'Coupon Delete Successfully');
        }
    }
}
