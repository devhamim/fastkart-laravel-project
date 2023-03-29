<?php

namespace App\Http\Controllers;

use App\Models\billingdetails;
use App\Models\card;
use App\Models\customer;
use App\Models\order;
use App\Models\orderProduct;
use App\Models\productInventory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;
use function GuzzleHttp\Promise\all;

class chackoutController extends Controller
{
    // chackout
    function chackout(){

        // if(customer::find(Auth::guard('customer')->user()->address) == null){
        //     return redirect()->route('customer.profile');
        // }
        // else{
            $cards = card::where('customer_id', Auth::guard('customer')->id())->get();
            $customer_address = customer::where('id', Auth::guard('customer')->id())->get();
            return view('frontend.chackout', [
                'cards'=>$cards,
                'customer_address'=>$customer_address,
            ]);
        // }

    }


    // chackout_store
    function chackout_store(Request $request){
        $request->validate([
            'number'=>'required',
            'address'=>'required',
        ]);

        if($request->payment_method == 1){
             $order_id = Str::random(3).rand(100000, 999999);
            // order
            order::insert([
                'order_id'=>$order_id,
                'customer_id'=>Auth::guard('customer')->id(),
                'subtotal'=>$request->subtotal,
                'shipping'=>$request->shipping,
                'discount'=>$request->discount,
                'grand_total'=>$request->grand_total,
                'payment_method'=>$request->payment_method,
                'created_at'=>Carbon::now(),
            ]);

            // billing details
            billingdetails::insert([
                'order_id'=>$order_id,
                'customer_id'=>Auth::guard('customer')->id(),
                'name'=>$request->name,
                'email'=>$request->email,
                'number'=>$request->number,
                'address'=>$request->address,
                'city_id'=>$request->city_id,
                'country_id'=>$request->country_id,
                'zip'=>$request->zip,
                'created_at'=>Carbon::now(),
            ]);

            $cards = card::where('customer_id', Auth::guard('customer')->id())->get();
            foreach($cards as $card){
                orderProduct::insert([
                    'order_id'=>$order_id,
                    'customer_id'=>Auth::guard('customer')->id(),
                    'product_id'=>$card->product_id,
                    'quantity'=>$card->quantity,
                    'total_price'=>$card->rel_to_pro->total_price,
                    'created_at'=>Carbon::now(),
                ]);

                productInventory::where('product_id', $card->product_id)->decrement('quantity', $card->quantity);

                // delete
                card::where('customer_id', Auth::guard('customer')->id())->delete();
            }


            return redirect()->route('order.success')->with([
                'order_id'=>$order_id,
            ]);
        }
        elseif($request->payment_method == 2){
            $data = $request->all();
            return redirect()->route('pay')->with('data', $data);
        }
        else{
            return back()->with('pament', 'Please Select Payment methord');
        }

    }


    // order_success
    function order_success(){
        if(session('order_id')){
            $order_product = orderProduct::where('order_id', session('order_id'))->get();
            $billing_details = billingdetails::where('order_id', session('order_id'))->get();
            return view('frontend.order_success', [
                'order_product'=>$order_product,
                'billing_details'=>$billing_details,
            ]);
        }
        else{
            abort(404);
        }
    }
}
