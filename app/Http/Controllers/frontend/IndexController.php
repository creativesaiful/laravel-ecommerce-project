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


       return view('frontend.index', compact('cata', 'sliders','products', 'allcata', 'features', 'hot_deals', 'special_offers', 'special_deals', 'skip_cate_0', 'skip_product_0', 'skip_cate_1', 'skip_product_1','skip_brand_0', 'skip_brand_product_0' ) );
   }



   public function ProductDetails($id, $slug){
       $product = Product::findOrFail($id);

       $product_size_en = explode(',', $product->product_size_en);
       $product_size_hin = explode(',', $product->product_size_hin);

        $product_color_en = explode(',', $product->product_color_en);
        $product_color_hin = explode(',', $product->product_color_hin);


        $cate_id = $product->category_id;

        $related_products = Product::where('category_id', $cate_id)->where('status', 0)->orderBy('id', 'desc')->limit(5)->get();

       $multiImgs = MultiImage::where('product_id', $id)->get();
       $hot_deals = Product::where('status', 0)->where('hot_deals', 1)->orderBy('id', 'desc')->limit(8)->get();



       return view("frontend.product.product_details", compact('product', 'multiImgs', 'hot_deals', 'product_size_en', 'product_size_hin', 'product_color_en', 'product_color_hin', 'related_products'));
   }


   public function TagwiseProduct($tag){
    $products = Product::where('status', 0)->where('product_tags_en',$tag)->orWhere('product_tags_hin',$tag)->orderBy('id', 'desc')->paginate(6);

    return view('frontend.product.tagwise_product', compact('products'));
   }//End of TagwiseProduct

   public function SubCateWiseProduct($sub_id, $slug){
    $products = Product::where('status', 0)->where('sub_category_id',$sub_id)->orderBy('id', 'desc')->paginate(6);

    return view('frontend.product.subcatewise_product', compact('products'));
   }//End of SubCateWiseProduct

   public function SubSubCateWiseProduct($sub_sub_id, $slug){
    $products = Product::where('status', 0)->where('sub_sub_category_id',$sub_sub_id)->orderBy('id', 'desc')->paginate(6);

    return view('frontend.product.subsubcatewise_product', compact('products'));

   }//End of SubSubCateWiseProduct



       /// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));//return multiple variable with json

	} // end method





}
