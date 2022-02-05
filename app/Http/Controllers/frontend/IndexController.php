<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\MultiImage;
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
    $features = Product::where('status', 0)->where('featured', 1)->orderBy('id', 'desc')->limit(8)->get();
    $hot_deals = Product::where('status', 0)->where('hot_deals', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'desc')->limit(8)->get();
    $special_offers = Product::where('status', 0)->where('special_offer', 1)->orderBy('id', 'desc')->limit(3)->get();
    $special_deals = Product::where('status', 0)->where('special_deals', 1)->orderBy('id', 'desc')->limit(3)->get();

    $skip_cate_0 = Catagory::skip(0)->first();
    $skip_product_0 = Product::where('category_id', $skip_cate_0->id)->where('status', 0)->orderBy('id', 'desc')->limit(8)->get();

    $skip_cate_1 = Catagory::skip(1)->first();
    $skip_product_1 = Product::where('category_id', $skip_cate_1->id)->where('status', 0)->orderBy('id', 'desc')->limit(8)->get();

    $skip_brand_0 = Brand::skip(0)->first();
    $skip_brand_product_0 = Product::where('brand_id', $skip_brand_0->id)->where('status', 0)->orderBy('id', 'desc')->limit(8)->get();


       return view('frontend.index', compact('catagory', 'cata', 'sliders','products', 'allcata', 'features', 'hot_deals', 'special_offers', 'special_deals', 'skip_cate_0', 'skip_product_0', 'skip_cate_1', 'skip_product_1','skip_brand_0', 'skip_brand_product_0' ) );
   }



   public function ProductDetails($id, $slug){
       $product = Product::findOrFail($id);
       $multiImgs = MultiImage::where('product_id', $id)->get();
       $hot_deals = Product::where('status', 0)->where('hot_deals', 1)->orderBy('id', 'desc')->limit(8)->get();
       return view("frontend.product.product_details", compact('product', 'multiImgs', 'hot_deals'));
   }


}
