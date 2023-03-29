<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\buttom_banner;
use App\Models\card;
use App\Models\category;
use App\Models\coupon;
use App\Models\offBanner;
use App\Models\product;
use App\Models\productInventory;
use App\Models\ProductSize;
use App\Models\thumbnaill;
use App\Models\top_banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class frontendController extends Controller
{
    //frontend index
    function index(){

        $banners = banner::all();
        $top_banner = top_banner::all();
        $butttom_banner = buttom_banner::all();
        $products = product::all();
        $categorys = category::all();
        $off_banner = offBanner::all();
        $coupon = coupon::all();
        return view('frontend.index', [
            'banners'=>$banners,
            'top_banner'=>$top_banner,
            'butttom_banner'=>$butttom_banner,
            'products'=>$products,
            'categorys'=>$categorys,
            'off_banner'=>$off_banner,
            'coupon'=>$coupon,
        ]);
    }

    // product_details
    function product_details($slug){
        $product_slug = product::where('slug', $slug)->get();
        $thumbnaills = thumbnaill::where('product_id', $product_slug->first()->id)->get();
        $quantity = ProductSize::all();
        $similler_product = product::where('category_id', $product_slug->first()->category_id)->where('id', '!=', $product_slug->first()->id)->get();
        $product_inventory = productInventory::where('product_id', $product_slug->first()->id)->get();
        return view('frontend.product_details', [
            'product_slug'=>$product_slug,
            'thumbnaills'=>$thumbnaills,
            'quantity'=>$quantity,
            'similler_product'=>$similler_product,
            'product_inventory'=>$product_inventory,
        ]);
    }

    // product_card
    function product_card(Request $request){

        $coupon = $request->coupon;
        $message = null;

        if($coupon == ''){
            $discount = 0;
        }
        else{
            if(coupon::where('coupon_code', $coupon)->exists()){
                if(Carbon::now()->format('Y-m-d') > coupon::where('coupon_code', $coupon)->first()->expiry_date){
                    $discount = 0;
                    $message = 'Coupon has been Expiry';
                }
                else{
                    $discount = coupon::where('coupon_code', $coupon)->first()->discount;
                }
            }
            else{
                $discount = 0;
                $message = 'Invalid Copun Code';
            }
        }

        $producr_cards = card::where('customer_id', Auth::guard('customer')->id())->get();
        return view('frontend.card', [
            'producr_cards'=>$producr_cards,
            'discount'=>$discount,
            'message'=>$message,
        ]);
    }


}
