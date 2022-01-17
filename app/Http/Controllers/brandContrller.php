<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Validation\Rules\Unique;
use Intervention\Image\Facades\Image;


class brandContrller extends Controller
{
    function ViewAllBrand(){

        $brandinfo = Brand::latest()->get();
        return view('backend.brand.view', compact('brandinfo'));
    }//end method

    function BrandSotre(Request $request){

        $request->validate([
            'brand_name_en'=>'required',
            'brand_name_hin'=>'required',
            'brand_image'=>'required',
        ],[
            'brand_name_en.required'=>'Please input Brand Name English',
            'brand_name_hin.required'=>'Please input Brand Name Hindi',
            'brand_image.required'=>'Please Select brand image to upload',
        ]);

        $imagepath = $request->file('brand_image');
        $imgName = hexdec(uniqid()).'.'.$imagepath->getClientOriginalExtension();

        Image::make($imagepath)->resize(300, 300)->save('upload/brands/'.$imgName);
        $imgUrl = ('upload/brands/'.$imgName);

        Brand::insert([
            'brand_name_en'=> $request->brand_name_en,
            'brand_name_hin'=>$request->brand_name_hin,

            'brand_slug_en'=>strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin'=>strtolower(str_replace(' ', '-', $request->brand_name_hin)),
            'brand_image'=> $imgUrl,
        ]);

        return back()->with(['message'=>'Brand Added successfully', 'type'=>'success']);
    }//End Method

    public function BrandEdit($id){
        $brandInfobyid =  Brand::findOrFail($id);

        return view('backend.brand.edit', compact('brandInfobyid'));

    }//End Method


    public function BrandUpdate(Request $request){
        $request->validate([
            'brand_name_en'=>'required',
            'brand_name_hin'=>'required',

        ],[
            'brand_name_en.required'=>'Please input Brand Name English',
            'brand_name_hin.required'=>'Please input Brand Name Hindi',

        ]);

        $id = $request->id;
        if($request->file('brand_image')){
            $imagepath = $request->file('brand_image');



         $imgName = hexdec(uniqid()).'.'.$imagepath->getClientOriginalExtension();


          $brandinfo=  Brand::find($id);

          $preImgPath =   $brandinfo->brand_image;

            unlink($preImgPath);

            Image::make($imagepath)->resize(300, 300)->save('upload/brands/'.$imgName);
            $imgUrl = ('upload/brands/'.$imgName);


            Brand::where("id", $id)->update([

            'brand_name_en'=> $request->brand_name_en,
            'brand_name_hin'=>$request->brand_name_hin,

            'brand_slug_en'=>strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin'=>strtolower(str_replace(' ', '-', $request->brand_name_hin)),
            'brand_image'=> $imgUrl,
            ]);
            return redirect('brand/view')->with(['message'=>'Brand updated successfully', 'type'=>'info']);

        }else{
            Brand::where("id", $id)->update([

                'brand_name_en'=> $request->brand_name_en,
                'brand_name_hin'=>$request->brand_name_hin,

                'brand_slug_en'=>strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin'=>strtolower(str_replace(' ', '-', $request->brand_name_hin)),

                ]);
         return redirect('brand/view')->with(['message'=>'Brand updated successfully', 'type'=>'info']);
        }

    }//End Method


    public function BrandDelete($id){
        Brand::where('id', '=', $id)->delete();
        return redirect('brand/view')->with(['message'=>'Brand Deleted successfully', 'type'=>'error']);
    }
}
