<?php

namespace App\Http\Controllers;

use App\Models\citie;
use App\Models\countrie;
use App\Models\customer;
use App\Models\orderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;
use Image;

class customerProfileController extends Controller
{
    //customer_profile
    function customer_profile(){
        $customer_profile = customer::all();
        $countrys = countrie::all();
        return view('frontend.customer_profile', [
            'customer_profile'=>$customer_profile,
            'countrys'=>$countrys,
        ]);
    }

    //customar_dashbord
    function customar_dashbord(){
        return view('frontend.customer_dashboard', [
        ]);
    }
    //customar_order
    function customar_order(){
        $order_pro =  orderProduct::where('customer_id', Auth::guard('customer')->id())->get();
        return view('frontend.customer_order', [
            'order_pro'=>$order_pro,
        ]);
    }
    //customar_wish
    function customar_wish(){
        return view('frontend.customer_wish', [
        ]);
    }
    //customar_card
    function customar_card(){
        return view('frontend.customer_card', [
        ]);
    }
    //customar_address
    function customar_address(){
        return view('frontend.customer_address', [
        ]);
    }
    //customar_privacy
    function customar_privacy(){
        return view('frontend.customer_privacy', [
        ]);
    }

    // getcity ajax
    function getcity(Request $request){
        $citys = citie::where('country_id', $request->country_id)->get();

        $str = '<option value="">-- Select City --</option>';

        foreach($citys as $city){
            $str .= '<option value="'.$city->id.'">'.$city->name.'</option>';
        }

        echo $str;
    }

    // customer_profile_update
    function customer_profile_update(Request $request){
        if($request->password == ''){
            if($request->customer_img == ''){
                if($request->customer_cover_img == ''){
                    if($request->gender == ''){
                        if($request->country_id == ''){
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'zip'=>$request->zip,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                        else{
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'country_id'=>$request->country_id,
                                'city_id'=>$request->city_id,
                                'zip'=>$request->zip,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                    }
                    else{
                        if($request->country_id == ''){
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'gender'=>$request->gender,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'zip'=>$request->zip,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                        else{
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'gender'=>$request->gender,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'country_id'=>$request->country_id,
                                'city_id'=>$request->city_id,
                                'zip'=>$request->zip,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                    }
                }
                else{
                    $cover_img = $request->customer_cover_img;
                    $extention = $cover_img->getClientOriginalExtension();
                    $file_name = Str::lower(str_replace(' ','-',Auth::guard('customer')->user()->name)).'.'.$extention;
                    Image::make($cover_img)->save(public_path('uplode/customer_cover/'. $file_name));

                    if($request->gender == ''){
                        if($request->country_id == ''){
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'zip'=>$request->zip,
                                'customer_cover_img'=>$file_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                        else{
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'country_id'=>$request->country_id,
                                'city_id'=>$request->city_id,
                                'zip'=>$request->zip,
                                'customer_cover_img'=>$file_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                    }
                    else{
                        if($request->country_id == ''){
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'gender'=>$request->gender,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'zip'=>$request->zip,
                                'customer_cover_img'=>$file_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                        else{
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'gender'=>$request->gender,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'country_id'=>$request->country_id,
                                'city_id'=>$request->city_id,
                                'zip'=>$request->zip,
                                'customer_cover_img'=>$file_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                    }
                }
            }
            else{
                $customer_img = $request->customer_img;
                $extention = $customer_img->getClientOriginalExtension();
                $profile_name = Str::lower(str_replace(' ','-',Auth::guard('customer')->user()->name)).'.'.$extention;
                Image::make($customer_img)->save(public_path('uplode/customer_profile/'. $profile_name));

                if($request->customer_cover_img == ''){
                    if($request->gender == ''){
                        if($request->country_id == ''){
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'zip'=>$request->zip,
                                'customer_img'=>$profile_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                        else{
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'country_id'=>$request->country_id,
                                'city_id'=>$request->city_id,
                                'zip'=>$request->zip,
                                'customer_img'=>$profile_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                    }
                    else{
                        if($request->country_id == ''){
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'gender'=>$request->gender,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'zip'=>$request->zip,
                                'customer_img'=>$profile_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                        else{
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'gender'=>$request->gender,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'country_id'=>$request->country_id,
                                'city_id'=>$request->city_id,
                                'zip'=>$request->zip,
                                'customer_img'=>$profile_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                    }
                }
                else{
                    $cover_img = $request->customer_cover_img;
                    $extention = $cover_img->getClientOriginalExtension();
                    $file_name = Str::lower(str_replace(' ','-',Auth::guard('customer')->user()->name)).'.'.$extention;
                    Image::make($cover_img)->save(public_path('uplode/customer_cover/'. $file_name));

                    if($request->gender == ''){
                        if($request->country_id == ''){
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'zip'=>$request->zip,
                                'customer_cover_img'=>$file_name,
                                'customer_img'=>$profile_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                        else{
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'country_id'=>$request->country_id,
                                'city_id'=>$request->city_id,
                                'zip'=>$request->zip,
                                'customer_cover_img'=>$file_name,
                                'customer_img'=>$profile_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                    }
                    else{
                        if($request->country_id == ''){
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'gender'=>$request->gender,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'zip'=>$request->zip,
                                'customer_cover_img'=>$file_name,
                                'customer_img'=>$profile_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                        else{
                            customer::where('id', Auth::guard('customer')->user()->id)->update([
                                'name'=>$request->name,
                                'email'=>$request->email,
                                'gender'=>$request->gender,
                                'number'=>$request->number,
                                'birthday'=>$request->birthday,
                                'address'=>$request->address,
                                'country_id'=>$request->country_id,
                                'city_id'=>$request->city_id,
                                'zip'=>$request->zip,
                                'customer_cover_img'=>$file_name,
                                'customer_img'=>$profile_name,
                            ]);
                            return back()->with('success', 'Profile Update Successfully');
                        }
                    }
                }
            }
        }
        else{
            $request->validate([
                'old_password'=>'required',
                'password'=>'required',
            ]);
            if(Hash::check($request->password, Auth::guard('customer')->user()->password)){
                if($request->customer_img == ''){
                    if($request->customer_cover_img == ''){
                        if($request->gender == ''){
                            if($request->country_id == ''){
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'zip'=>$request->zip,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                            else{
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'country_id'=>$request->country_id,
                                    'city_id'=>$request->city_id,
                                    'zip'=>$request->zip,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                        }
                        else{
                            if($request->country_id == ''){
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'gender'=>$request->gender,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'zip'=>$request->zip,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                            else{
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'gender'=>$request->gender,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'country_id'=>$request->country_id,
                                    'city_id'=>$request->city_id,
                                    'zip'=>$request->zip,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                        }
                    }
                    else{
                        $cover_img = $request->customer_cover_img;
                        $extention = $cover_img->getClientOriginalExtension();
                        $file_name = Str::lower(str_replace(' ','-',Auth::guard('customer')->user()->name)).'.'.$extention;
                        Image::make($cover_img)->save(public_path('uplode/customer_cover/'. $file_name));

                        if($request->gender == ''){
                            if($request->country_id == ''){
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'zip'=>$request->zip,
                                    'customer_cover_img'=>$file_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                            else{
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'country_id'=>$request->country_id,
                                    'city_id'=>$request->city_id,
                                    'zip'=>$request->zip,
                                    'customer_cover_img'=>$file_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                        }
                        else{
                            if($request->country_id == ''){
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'gender'=>$request->gender,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'zip'=>$request->zip,
                                    'customer_cover_img'=>$file_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                            else{
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'gender'=>$request->gender,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'country_id'=>$request->country_id,
                                    'city_id'=>$request->city_id,
                                    'zip'=>$request->zip,
                                    'customer_cover_img'=>$file_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                        }
                    }
                }
                else{
                    $customer_img = $request->customer_img;
                    $extention = $customer_img->getClientOriginalExtension();
                    $profile_name = Str::lower(str_replace(' ','-',Auth::guard('customer')->user()->name)).'.'.$extention;
                    Image::make($customer_img)->save(public_path('uplode/customer_profile/'. $profile_name));

                    if($request->customer_cover_img == ''){
                        if($request->gender == ''){
                            if($request->country_id == ''){
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'zip'=>$request->zip,
                                    'customer_img'=>$profile_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                            else{
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'country_id'=>$request->country_id,
                                    'city_id'=>$request->city_id,
                                    'zip'=>$request->zip,
                                    'customer_img'=>$profile_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                        }
                        else{
                            if($request->country_id == ''){
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'gender'=>$request->gender,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'zip'=>$request->zip,
                                    'customer_img'=>$profile_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                            else{
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'gender'=>$request->gender,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'country_id'=>$request->country_id,
                                    'city_id'=>$request->city_id,
                                    'zip'=>$request->zip,
                                    'customer_img'=>$profile_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                        }
                    }
                    else{
                        $cover_img = $request->customer_cover_img;
                        $extention = $cover_img->getClientOriginalExtension();
                        $file_name = Str::lower(str_replace(' ','-',Auth::guard('customer')->user()->name)).'.'.$extention;
                        Image::make($cover_img)->save(public_path('uplode/customer_cover/'. $file_name));

                        if($request->gender == ''){
                            if($request->country_id == ''){
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'zip'=>$request->zip,
                                    'customer_cover_img'=>$file_name,
                                    'customer_img'=>$profile_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                            else{
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'country_id'=>$request->country_id,
                                    'city_id'=>$request->city_id,
                                    'zip'=>$request->zip,
                                    'customer_cover_img'=>$file_name,
                                    'customer_img'=>$profile_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                        }
                        else{
                            if($request->country_id == ''){
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'gender'=>$request->gender,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'zip'=>$request->zip,
                                    'customer_cover_img'=>$file_name,
                                    'customer_img'=>$profile_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                            else{
                                customer::where('id', Auth::guard('customer')->user()->id)->update([
                                    'name'=>$request->name,
                                    'email'=>$request->email,
                                    'gender'=>$request->gender,
                                    'number'=>$request->number,
                                    'birthday'=>$request->birthday,
                                    'address'=>$request->address,
                                    'country_id'=>$request->country_id,
                                    'city_id'=>$request->city_id,
                                    'zip'=>$request->zip,
                                    'customer_cover_img'=>$file_name,
                                    'customer_img'=>$profile_name,
                                    'password'=>bcrypt($request->password),
                                ]);
                                return back()->with('success', 'Profile Update Successfully');
                            }
                        }
                    }
                }
            }
            else{
                return back()->with('pass', 'Old Password Wrong');
            }
        }
    }


}
