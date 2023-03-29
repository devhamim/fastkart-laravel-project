<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\customerReg;
use Illuminate\Http\Request;

class customerregController extends Controller
{
    //customer reg
    function customer_reg(){
        return view('frontend.customer_reg');
    }

    // customer store
    function customer_reg_store(Request $request){
       $request->validate([
        '*'=>'required',
       ]);

       customer::insert([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>bcrypt($request->password),
       ]);
       return redirect()->route('customer.log.view');
    }

}
