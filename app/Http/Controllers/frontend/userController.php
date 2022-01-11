<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    function getUserData(){
        $id = Auth::user()->id;
        $userInfo = User::find($id);


        return view('frontend/edit_user', ['userInfo'=>$userInfo]) ;
    }


    function userUpdate(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);

        $id = Auth::user()->id;

        $userdata = User::find($id);

        if($request->file('profilephoto')){
            $photoPath = $request->file('profilephoto');

            $filename = date('dmdHi').$photoPath->getClientOriginalName();

            if(!empty($userdata->profile_photo_path)){
                unlink(public_path('upload/userProfile/').$userdata->profile_photo_path);
            };


            $photoPath->move(public_path('upload/userProfile'), $filename);

            $userdata->profile_photo_path =  $filename;
        }

        $userdata->name=$request->name;
        $userdata->email=$request->email;
        $userdata->phone=$request->phone;

        $userdata->save();
        return redirect('dashboard')->with(['message'=>'Profile Updated successfully', 'type'=>'success']);
    }



    function userChangePassword(){


        return view('frontend.user_edit_pass');
    }



    function userUpdatePassword(Request $request){

        $request->validate([
            'old_password'=>'required',
            'password'=>'required | confirmed',
            'password_confirmation'=>'required '
        ]);


        $id = Auth::user()->id;
        $userInfo = User::find($id);

        if( Hash::check($request->old_password,  $userInfo->password)){
            $userInfo->password = Hash::make($request->password);
            $userInfo->save();

            Auth::logout();
            return redirect('/');
        }else{
            return back()->with(['message'=>'Old password did not match', 'type'=>'warning']);
        }


    }


}
