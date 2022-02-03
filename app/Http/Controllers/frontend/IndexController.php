<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Slider;

class IndexController extends Controller
{
   public function index(){
   $catagory =  Catagory::orderBy('catagory_name_en', 'ASC')->get();
   $cata =  Catagory::orderBy('catagory_name_en', 'ASC')->get();
   $allcata =  Catagory::orderBy('catagory_name_en', 'ASC')->get();

   $sliders = Slider::where('status', 1)->orderBy('id', 'DESC')->get();

   $products = Product::where('status', 0)->orderBy('id', 'desc')->limit(8)->get();

       return view('frontend.index', compact('catagory', 'cata', 'sliders','products', 'allcata' ) );
   }


}
