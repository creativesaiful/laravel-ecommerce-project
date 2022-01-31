<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class sliderController extends Controller
{
    public function SliderView(){
       $allSlide =  Slider::latest()->get();
       return view('backend.slider.slider_view', ['allSlide'=>$allSlide]);
    }//End Method


    public function SliderStore(Request $request){

        $request->validate([
            'slider_img'=>'required',
        ]);

        $imagepath = $request->file('slider_img');
        $imgName = hexdec(uniqid()).'.'.$imagepath->getClientOriginalExtension();

        Image::make($imagepath)->resize(870, 370)->save('upload/slides/'.$imgName);
        $imgUrl = ('upload/slides/'.$imgName);

        Slider::insert([
            'slider_img'=>  $imgUrl,
            'title'=>$request->title,
            'description'=>$request->description,
            'created_at'=>Carbon::now()
        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Slider Added successfully',

        ];

        return back()->with($notification);
    }


    public function SliderEdit($id){
        $slideInfo = Slider::find($id);
        return view('backend.slider.slider_edit', ['slideInfo'=>$slideInfo]);
    }


    public function SliderUpdate(Request $request, $id){

        $sliderInfo = Slider::find($id);

        if($request->file('slider_img')){
            $imagepath = $request->file('slider_img');
            $imgName = hexdec(uniqid()).'.'.$imagepath->getClientOriginalExtension();
           @unlink($sliderInfo->slider_img);
            Image::make($imagepath)->resize(870, 370)->save('upload/slides/'.$imgName);
            $imgUrl = ('upload/slides/'.$imgName);
        }else{
            $imgUrl = $sliderInfo->slider_img;
        }

        Slider::where('id', $id)->update([
            'slider_img'=> $imgUrl,
            'title'=>$request->title,
            'description'=>$request->description,
            'updated_at'=>Carbon::now()
        ]);

        $notification = [
            'type'=>'success',
            'message'=>'Slider updated successfully',

        ];

        return redirect()->route('slider.view')->with($notification);

    }//End Method


    public function SliderDelete($id){
        Slider::destroy($id);

        $notification = [
            'type'=>'error',
            'message'=>'Slider Deleted successfully',

        ];

        return back()->with($notification);

    }


    public function SlideActive($id){
      Slider::findOrFail($id)->update(['status'=>1]);

      $notification = [
        'type'=>'success',
        'message'=>'Slider Active successfully',

          ];

    return back()->with($notification);


    }

    public function SlideInActive($id){
        Slider::findOrFail($id)->update(['status'=>0]);

        $notification = [
          'type'=>'error',
          'message'=>'Slider InActive successfully',

            ];

      return back()->with($notification);


      }
}
