<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Catagory;
use App\Models\Subcata;

use App\Models\Subsubcate;

class ProductController extends Controller
{
    public function ProductCreate(){
        $data['brand'] = Brand::orderBy('brand_name_en','ASC')->get();
        $data['category'] = Catagory::orderBy('catagory_name_en','ASC')->get();
        return view('backend.products.product_add', $data);
    }//End Method


    // Sub Category Ajax methods

    public function cateToSubCate($cate_id){
       $subCategory =  Subcata::where('category_id', $cate_id)->orderBy('subcata_name_en', 'ASC')->get();

       return json_encode($subCategory);
    }

    // Sub Sub Category Ajax methods

    public function subTosubSubCate($subcate_id){
        $subSubCategory =  Subsubcate::where('sub_category_id', $subcate_id)->orderBy('subsubcata_name_en', 'ASC')->get();

        return json_encode($subSubCategory);
     }





    public function ProductStore(Request $request){
        return $request;
    }//End Method


    public function ProductView(){

    }//End Method
}
