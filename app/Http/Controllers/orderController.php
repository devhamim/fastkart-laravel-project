<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\orderProduct;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //order_details
    function order_list(){
        $order_list = order::all();
        return view('admin.order.order_list', [
            'order_list'=>$order_list,
        ]);
    }


    //order_details
    function order_details($order_id){
        $order = order::find($order_id);
        return view('admin.order.order_details', [
            'order'=>$order,
        ]);
    }
}
