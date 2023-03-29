<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\buttom_banner;
use App\Models\offBanner;
use App\Models\top_banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;
use Image;

class bannerController extends Controller
{
    //banner
    function banner(){
        $banners = banner::all();
        return view('admin.banner.banner', [
            'banners'=>$banners,
        ]);
    }

    // banner store
    function banner_store(Request $request){
        $request->validate([
            'banner_img'=>'required',
        ]);

        $banner_img = $request->banner_img;
        $extention = $banner_img->getClientOriginalExtension();
        $file_name = Str::random(5).'-'.rand(100000,999999).'.'.$extention;
        Image::make($banner_img)->resize(1155,670)->save(public_path('uplode/banner/'. $file_name));

        banner::insert([
            'banner_offer'=>$request->banner_offer,
            'banner_titel'=>$request->banner_titel,
            'banner_hi'=>$request->banner_hi,
            'banner_des'=>$request->banner_des,
            'banner_img'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('bsuccess', 'Banner Add Successfully');
    }

    // banner_delete
    function banner_delete($banner_id){
        $banner_image = banner::where('id', $banner_id)->first()->banner_img;
        $banner_img_del = public_path('uplode/banner/'. $banner_image);
        unlink($banner_img_del);

        banner::find($banner_id)->delete();
        return back()->with('delete', 'Banner Delete Successfully');
    }


// top_banner
function top_banner(){
    $tbanners = top_banner::all();
    return view('admin.banner.top_banner', [
        'tbanners'=>$tbanners,
    ]);
}
// top banner store
function top_banner_store(Request $request){
    $request->validate([
        'tbanner_img'=>'required',
    ]);

    $banner_img = $request->tbanner_img;
    $extention = $banner_img->getClientOriginalExtension();
    $file_name = Str::random(5).'-'.rand(100000,999999).'.'.$extention;
    Image::make($banner_img)->resize(415,320)->save(public_path('uplode/banner/top_banner/'. $file_name));

    top_banner::insert([
        'tbanner_offer'=>$request->tbanner_offer,
        'tbanner_titel'=>$request->tbanner_titel,
        'tbanner_hi'=>$request->tbanner_hi,
        'tbanner_des'=>$request->tbanner_des,
        'tbanner_img'=>$file_name,
        'created_at'=>Carbon::now(),
    ]);
    return back()->with('bsuccess', 'Banner Add Successfully');
}

    // top banner_delete
    function top_banner_delete($tbanner_id){
        $banner_image = top_banner::where('id', $tbanner_id)->first()->tbanner_img;
        $banner_img_del = public_path('uplode/banner/top_banner/'. $banner_image);
        unlink($banner_img_del);

        top_banner::find($tbanner_id)->delete();
        return back()->with('delete', 'Banner Delete Successfully');
    }



    // buttom banner
    function buttom_banner(){
        $bbanners = buttom_banner::all();
        return view('admin.banner.buttom_banner', [
            'bbanners'=>$bbanners,
        ]);
    }
    // buttom banner store
    function buttom_banner_store(Request $request){
        $request->validate([
            'bbanner_img'=>'required',
        ]);

        $banner_img = $request->bbanner_img;
        $extention = $banner_img->getClientOriginalExtension();
        $file_name = Str::random(5).'-'.rand(100000,999999).'.'.$extention;
        Image::make($banner_img)->resize(376,231)->save(public_path('uplode/banner/buttom_banner/'. $file_name));

        buttom_banner::insert([
            'bbanner_offer'=>$request->bbanner_offer,
            'bbanner_titel'=>$request->bbanner_titel,
            'bbanner_hi'=>$request->bbanner_hi,
            'bbanner_des'=>$request->bbanner_des,
            'bbanner_img'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('bsuccess', 'Banner Add Successfully');
    }

    // buttom banner_delete
    function buttom_banner_delete($bbanner_id){
        $banner_image = buttom_banner::where('id', $bbanner_id)->first()->bbanner_img;
        $banner_img_del = public_path('uplode/banner/buttom_banner/'. $banner_image);
        unlink($banner_img_del);

        buttom_banner::find($bbanner_id)->delete();
        return back()->with('delete', 'Banner Delete Successfully');
    }

    // off banner
    function off_banner(){
        $off_banner = offBanner::all();
        return view('admin.banner.off_banner', [
            'off_banner'=>$off_banner,
            ]);
        }

    // off banner store
    function off_banner_store(Request $request){
        $request->validate([
            'fbanner_img'=>'required',
        ]);

        $banner_img = $request->fbanner_img;
        $extention = $banner_img->getClientOriginalExtension();
        $file_name = Str::random(5).'-'.rand(100000,999999).'.'.$extention;
        Image::make($banner_img)->resize(583,157)->save(public_path('uplode/banner/off_banner/'. $file_name));

        offBanner::insert([
            'fbanner_offer'=>$request->fbanner_offer,
            'fbanner_titel'=>$request->fbanner_titel,
            'fbanner_img'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('fsuccess', 'Banner Add Successfully');
    }

     // off banner_delete
     function off_banner_delete($fbanner_id){
        $banner_image = offBanner::where('id', $fbanner_id)->first()->fbanner_img;
        $banner_img_del = public_path('uplode/banner/off_banner/'. $banner_image);
        unlink($banner_img_del);

        offBanner::find($fbanner_id)->delete();
        return back()->with('delete', 'Banner Delete Successfully');
    }

}
