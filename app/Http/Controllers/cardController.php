<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Models\productInventory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cardController extends Controller
{
    //card_store
    function card_store(Request $request){
        if(Auth::guard('customer')->id()){
            $quantity = productInventory::where('product_id', $request->product_id)->first()->quantity;
            if($quantity >= $request->quantity){
                if(card::where('product_id', $request->product_id)->where('customer_id', Auth::guard('customer')->id())->exists()){
                    card::where('product_id', $request->product_id)->where('customer_id', Auth::guard('customer')->id())->increment('quantity', $request->quantity);

                    return back()->with('success', 'Product Update to Card');
                }
                else{
                    $request->validate([
                        'quantity'=>'required'
                    ]);
                    card::insert([
                        'customer_id'=>Auth::guard('customer')->id(),
                        'product_id'=>$request->product_id,
                        'quantity'=>$request->quantity,
                        'created_at'=>Carbon::now(),
                    ]);
                    return back()->with('success', 'Product Add to Card');
                }
            }
            else{
                return back()->with('stock', 'Stock Out this Product');
            }
        }
        else{
            return redirect()->route('customer.log.view');
        }
    }

    // card_delete
    function card_delete($card_id){
        card::find($card_id)->delete();
        return back();
    }


}
