<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
    function viewAdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view', ['adminData'=>$adminData]);
    }


    function editAdminProfile(){
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', ['editData'=>$editData]);
    }





    function storeAdminProfile(Request $request){

         $adminData = Admin::find(1);
        $adminData->email = $request->email;
         $adminData->name = $request->name;

        $adminData->password = Hash::make($request->password2);

        if($request->file('profilephoto')){
            $imgpath =  $request->file('profilephoto');
            $filename = date('dmdHi').$imgpath->getClientOriginalName();

            if(!empty($adminData->profile_photo_path)){
                unlink(public_path('upload/adminProfile/').$adminData->profile_photo_path);
            };
            $imgpath->move(public_path('upload/adminProfile'), $filename);

            $adminData->profile_photo_path =  $filename;

        }

        $dbresponse = $adminData->save();







        return redirect()->route('admin.profile')->with(['message'=>'Profile Updated successfully', 'type'=>'success']);




    }
}
