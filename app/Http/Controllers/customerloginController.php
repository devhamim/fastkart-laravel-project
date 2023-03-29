<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class customerloginController extends Controller
{
    //customer_login view
    function customer_log_view(){
        return view('frontend.customer_login');
    }

    // customer_login
    function customer_login(Request $request){
        $request->validate([
            '*'=>'required',
        ]);

        if(Auth::guard('customer')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('/');
        }
        else{
            return back()->with('logfail', 'Login Fail');
        }
    }

    // customer logout
    function customer_logout(){
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}
