<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subsubcate;
use App\Models\Catagory;

use App\Models\Subcata;


class subsubcateController extends Controller
{
    function ViewAllSubsubcate()
    {
        $subsubInfo = Subsubcate::latest()->get();
        $cataInfo = Catagory::orderBy('catagory_name_en', 'ASC')->get();

        return view('backend.subsubcata.view', ['subsubInfo' => $subsubInfo, 'cataInfo'=>$cataInfo]);
    }//End Method


    function SubcateAjax($cate_id){

        $subcataInfo = Subcata::where('category_id', $cate_id)->orderBy('subcata_name_en', 'ASC')->get();
        return json_encode($subcataInfo);
    }//End Method


    function SotreSubsubcate(Request $request){
        Subsubcate::insert([
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'subsubcata_name_en'=>$request->subsubcata_name_en,
            'subsubcata_name_hin'=>$request->subsubcata_name_hin,
            'subsubcata_slug_en'=>strtolower(str_replace(' ', '-', $request->subsubcata_name_en)),
            'subsubcata_slug_hin'=>strtolower(str_replace(' ', '-', $request->subsubcata_name_hin))
        ]);

        $success = [
            'type' => 'success',
            'message'=>'Sub Category Added successfully',
        ];

        return back()->with($success);
    }//End Method


    public function EditSubsubcate($id){
        $cataInfo = Catagory::orderBy('catagory_name_en', 'ASC')->get();//category info
        $subCateInfo = Subcata::orderBy('subcata_name_en', 'ASC')->get(); //Sub category information

        $subsubInfo = Subsubcate::find($id);//sub sub category info with id

        return view('backend.subsubcata.edit', ['subsubInfo'=>$subsubInfo, 'subCateInfo'=>$subCateInfo, 'cataInfo' =>$cataInfo]);

    }


    public function UpdateSubsubcate(Request $request){



        $request->validate([
            'subsubcata_name_en'=>'required',
            'subsubcata_name_hin'=>'required',
        ]);


        Subsubcate::where('id', $request->id)->update([
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->sub_category_id,
            'subsubcata_name_en'=>$request->subsubcata_name_en,
            'subsubcata_name_hin'=>$request->subsubcata_name_hin,
        ]);

        $success = [
            'type' => 'success',
            'message'=>'Sub Sub Category updated successfully',
        ];

        return redirect()->route('subsubcata.view')->with($success);


    }//End Method

    public function DeleteSubsubcate($id){
        Subsubcate::destroy($id);
        return back();
    }
}
