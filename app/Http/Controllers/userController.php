<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class userController extends Controller
{
    //user view
    function user_list(){
        $users = User::all();
        return view('admin.user.user_list', [
            'users'=>$users,
        ]);
    }

    // user add
    function add_user(){
        return view('admin.user.add_user');
    }
    // user store
    function user_stor(Request $request){
        $users = User::insert([
            'fast_name'=>$request->fast_name,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
        ]);
        return back()->with('success', 'User Add Successfully');
    }

    // account setting
    function account_setting(){
        return view('admin.user.account_setting');
    }

    // user account update
    function account_update(Request $request){
        if($request->password == ''){
            if($request->photo == ''){
                User::find(Auth::id())->update([
                    'fast_name'=>$request->fast_name,
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                ]);
                return back()->with('success', 'Profile Update Successfully');
            }
            else{
                if(Auth::user()->photo  == null){
                    $uploded_photo = $request->photo;
                    $extention = $uploded_photo->getClientOriginalExtension();
                    $file_name = Auth::id().'.'.$extention;
                    Image::make($uploded_photo)->save(public_path('uplode/user/'. $file_name));

                    User::find(Auth::id())->update([
                        'fast_name'=>$request->fast_name,
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'photo'=>$file_name,
                    ]);
                    return back()->with('success', 'Photo Uplode Successfully');
                }
                else{
                    $photo_del = public_path('uplode/user/'. Auth::user()->photo);
                    unlink($photo_del);

                    $uploded_photo = $request->photo;
                    $extention = $uploded_photo->getClientOriginalExtension();
                    $file_name = Auth::id().'.'.$extention;
                    Image::make($uploded_photo)->save(public_path('uplode/user/'. $file_name));

                    User::find(Auth::id())->update([
                        'fast_name'=>$request->fast_name,
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'photo'=>$file_name,
                    ]);
                    return back()->with('success', 'Photo Update Successfully');
                }
            }

        }
        else{
            if(Hash::check($request->old_password, Auth::user()->password)){
                if($request->photo == ''){
                    User::find(Auth::id())->update([
                        'fast_name'=>$request->fast_name,
                        'name'=>$request->name,
                        'email'=>$request->email,
                        'phone'=>$request->phone,
                        'password'=>bcrypt($request->password),
                    ]);
                    return back()->with('success', 'Profile Update Successfully!!');
                }
                else{
                    if(Auth::user()->photo == null){
                        $uploded_photo = $request->photo;
                        $extention = $uploded_photo->getClientOriginalExtension();
                        $file_name = Auth::id().'.'.$extention;
                        Image::make($uploded_photo)->save(public_path('uplode/user/'. $file_name));

                        User::find(Auth::id())->update([
                            'fast_name'=>$request->fast_name,
                            'name'=>$request->name,
                            'email'=>$request->email,
                            'phone'=>$request->phone,
                            'photo'=>$file_name,
                            'password'=>bcrypt($request->password),
                        ]);
                        return back()->with('success', 'Profile Update Successfully!!!!');
                    }
                    else{
                        $photo_del = public_path('uplode/user/'. Auth::user()->photo);
                        unlink($photo_del);

                        $uploded_photo = $request->photo;
                        $extention = $uploded_photo->getClientOriginalExtension();
                        $file_name = Auth::id().'.'.$extention;
                        Image::make($uploded_photo)->save(public_path('uplode/user/'. $file_name));

                        User::find(Auth::id())->update([
                            'fast_name'=>$request->fast_name,
                            'name'=>$request->name,
                            'email'=>$request->email,
                            'phone'=>$request->phone,
                            'photo'=>$file_name,
                            'password'=>bcrypt($request->password),
                        ]);
                        return back()->with('success', 'Profile Update Successfully!!!');
                    }
                }

            }
            else{
                return back()->with('warning', 'Old Password Not Metch');
            }
        }
    }

    // user delete
    function user_delete($user_id){
        User::find($user_id)->delete();
        return back()->with('user_del', 'User Delete Successfully');
    }
}
