<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;
use Nette\Utils\Random;
use Intervention\Image\Facades\Image;
class catagoryController extends Controller
{
    public function ViewAllCata(){
        $cataInfo = Catagory::latest()->get();

        return view('backend.catagories.view', ['cataInfo'=>$cataInfo]);
    }//End Method


    public function SotreCata(Request $request){

        $request->validate([
            'catagory_name_en'=>'required',
            'catagory_name_hin'=>'required',
            'catagory_icon'=>'required',
        ],[
            'catagory_name_en.required'=>'Please input Brand Name English',
            'catagory_name_hin.required'=>'Please input Brand Name Hindi',
            'catagory_icon.required'=>'Please input Catagory Icon from fontawesome ',
        ]);


           $result =  Catagory::insert([
                'catagory_name_en'=>$request->catagory_name_en,
                'catagory_name_hin'=>$request->catagory_name_hin,
                'catagory_slug_en'=>strtolower(str_replace(' ', '-', $request->catagory_name_en)),
                'catagory_slug_hin'=>strtolower(str_replace(' ', '-', $request->catagory_name_hin)),
                'catagory_icon'=> $request->catagory_icon,
            ]);

            $success = [
                'type' => 'success',
                'message'=>'Catagory Added successfully',
            ];
            $fail = [
                'type' => 'error',
                'message'=>'Catagory Added Failed',
            ];

            if($result==1){
                return back()->with($success);
            }else{
                return back()->with($fail);
            }




    }//Method End

    public function DeleteCata($id){
        $CataInfo=  Catagory::find($id);
        $ImgPath =   $CataInfo->catagory_icon;

        Catagory::where('id', '=', $id)->delete();
        unlink($ImgPath);
        return back();
    }
}
