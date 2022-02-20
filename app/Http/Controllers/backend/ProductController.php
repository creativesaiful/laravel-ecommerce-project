<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Catagory;
use App\Models\Subcata;

use App\Models\Subsubcate;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use App\Models\MultiImage;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function ProductCreate()
    {
        $data['brand'] = Brand::orderBy('brand_name_en', 'ASC')->get();
        $data['category'] = Catagory::orderBy('catagory_name_en', 'ASC')->get();
        return view('backend.products.product_add', $data);
    } //End Method


    // Sub Category Ajax methods

    public function cateToSubCate($cate_id)
    {
        $subCategory =  Subcata::where('category_id', $cate_id)->orderBy('subcata_name_en', 'ASC')->get();

        return json_encode($subCategory);
    }

    // Sub Sub Category Ajax methods

    public function subTosubSubCate($subcate_id)
    {
        $subSubCategory =  Subsubcate::where('sub_category_id', $subcate_id)->orderBy('subsubcata_name_en', 'ASC')->get();

        return json_encode($subSubCategory);
    }





    public function ProductStore(Request $request)
    {

        $imagepath = $request->file('product_thumbnail');
        $imgName = hexdec(uniqid()).'.'.$imagepath->getClientOriginalExtension();

        Image::make($imagepath)->resize(917, 1000)->save('upload/products/thumbnail/'.$imgName);
        $imgUrl = ('upload/products/thumbnail/'.$imgName);


        $productId =  Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_id' => $request->sub_sub_category_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => strtolower(str_replace(' ', '-', $request->product_name_hin)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_hin' => $request->short_description_hin,

            'long_description_en' => $request->long_description_en,
            'long_description_hin' => $request->long_description_hin,

            'product_thumbnail' => $imgUrl, //Have to work

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'created_at' => Carbon::now(),

        ]);

        $multi_images = $request->file('multi_images');

        foreach ($multi_images as $img) {
            $singleImg = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();

            Image::make($img)->resize(917, 1000)->save('upload/products/multiImg/'.$singleImg);
            $imageUrl = ('upload/products/multiImg/'.$singleImg);

            MultiImage::insert([
                'product_id' => $productId,
                'image_path' => $imageUrl,
                'created_at' => Carbon::now(),
            ]);
        }



        $success = [
            'type' => 'success',
            'message' => 'Product Added successfully',
        ];


        return redirect()->route('product.view')->with($success);
    } //End Method




    public function ProductView()
    {
        $productInfo = Product::latest()->get();
        return view('backend.products.product_view', ['productInfo' => $productInfo]);
    } //End Method




    public function ProductEdit($id)
    {

        $brand = Brand::orderBy('brand_name_en', 'ASC')->get();
        $category = Catagory::orderBy('catagory_name_en', 'ASC')->get();
        $pdt_info = Product::find($id);

        $sub_cate = Subcata::where('category_id', $pdt_info['category_id'])->get();
        $sub_sub_cate = Subsubcate::where('sub_category_id', $pdt_info['sub_category_id'])->get();

        $multiImg = MultiImage::where('product_id', $id)->get();



        return view('backend.products.product_edit', ['brand' => $brand, 'category' => $category, 'pdt_info' => $pdt_info, 'sub_cate' => $sub_cate, 'sub_sub_cate' => $sub_sub_cate, 'multiImg' => $multiImg]);
    } //End Method



    public function ProductUpdate(Request $request, $id)
    {
        if($request->file('product_thumbnail')){
        $imagepath = $request->file('product_thumbnail');
        $imgName = hexdec(uniqid()).'.'.$imagepath->getClientOriginalExtension();
        $pdtInfo = Product::findOrFail($id);
        @unlink($pdtInfo->product_thumbnail);
        Image::make($imagepath)->resize(917, 1000)->save('upload/products/thumbnail/'.$imgName);
        $imgUrl = ('upload/products/thumbnail/'.$imgName);
        }else{
            $pdtInfo = Product::findOrFail($id);
            $imgUrl = $pdtInfo->product_thumbnail;
        }
        $productId =  Product::where('id', $id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'sub_sub_category_id' => $request->sub_sub_category_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => strtolower(str_replace(' ', '-', $request->product_name_hin)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_description_en' => $request->short_description_en,
            'short_description_hin' => $request->short_description_hin,

            'long_description_en' => $request->long_description_en,
            'long_description_hin' => $request->long_description_hin,

            'product_thumbnail' => $imgUrl,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'updated_at' => Carbon::now(),

        ]);

        $success = [
            'type' => 'success',
            'message' => 'Product Updated successfully',
        ];


        return redirect()->route('product.view')->with($success);
    }
    //End Method


    public function ProductImgUpdate(Request $request)
    {
        $multiImg = $request->multiImg;


        foreach ($multiImg as $key => $img) {

            $delImg = MultiImage::findOrFail($key);

            @unlink($delImg->image_path);
            $imgName = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            Image::make($img)->resize(917, 1000)->save('upload/products/multiImg/' . $imgName);
            $imageUrl = ('upload/products/multiImg/' . $imgName);

            MultiImage::where('id', $key)->update([
                'image_path' => $imageUrl,
                'updated_at' => Carbon::now()
            ]);
        }



        $success = [
            'type' => 'success',
            'message' => 'Galary Updated successfully',
        ];


        return redirect()->route('product.view')->with($success);
    }



    public function ProductImgRemove($id)
    {
        $image =  MultiImage::find($id);
        @unlink($image->image_path);
        MultiImage::destroy($id);

        $success = [
            'type' => 'success',
            'message' => 'Image Remove successfully',
        ];


        return redirect()->route('product.view')->with($success);
    }


    public function productInactive($id){
        Product::find($id)->update([
            'status'=>1,
            'updated_at'=>Carbon::now(),
        ]);

        $success = [
            'type' => 'error',
            'message' => 'Inactive Product',
        ];


        return redirect()->route('product.view')->with($success);
    }

    public function productActive($id){
        Product::find($id)->update([
            'status'=>0,
            'updated_at'=>Carbon::now(),
        ]);

        $success = [
            'type' => 'success',
            'message' => 'Inactive Product',
        ];


        return redirect()->route('product.view')->with($success);
    }


    public function ProductDelete($id)
    {
        $pdt_id = Product::find($id);
        @unlink($pdt_id->product_thumbnail);
        Product::destroy($id);

        $multiImg = MultiImage::where('product_id', $id)->get();

        foreach($multiImg as $img){
            @unlink($img->image_path);
            MultiImage::where('product_id', $id)->delete();
        }

        $success = [
            'type' => 'error',
            'message' => 'Product Deleted successfully',
        ];


        return redirect()->route('product.view')->with($success);

    }
}
