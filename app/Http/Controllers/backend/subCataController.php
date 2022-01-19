<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcata;
use App\Models\Catagory;
class subCataController extends Controller
{
    public function ViewAllSubcata(){
        $subcataInfo = Subcata::latest()->get();


        $cataInfo = Catagory::orderBy('catagory_name_en', 'ASC')->get();


        return view('backend.subcata.view', ['subcataInfo'=>$subcataInfo, 'cataInfo'=>$cataInfo]);
    }//End Method


    public function SotreSubcata(Request $request){



        $request->validate([
            'category_id'=>'required',
            'subcata_name_en'=>'required',
            'subcata_name_hin'=>'required',


        ],[
            'subcata_name_en.required'=>'Please input Sub Category English',
            'subcata_name_hin.required'=>'Please input Sub Category Hindi',
            'category_id.required'=>'Please Select Catagory ',
        ]);


           $result = Subcata::insert([
               'category_id'=>$request->category_id,

                'subcata_name_en'=>$request->subcata_name_en,
                'subcata_name_hin'=>$request->subcata_name_hin,
                'subcata_slug_en'=>strtolower(str_replace(' ', '-', $request->subcata_name_en)),
                'subcata_slug_hin'=>strtolower(str_replace(' ', '-', $request->subcata_name_hin)),

            ]);

            $success = [
                'type' => 'success',
                'message'=>'Sub Category Added successfully',
            ];
            $fail = [
                'type' => 'error',
                'message'=>'Sub Category Added Failed',
            ];

            if($result==1){
                return back()->with($success);
            }else{
                return back()->with($fail);
            }




    }//Method End

    public function EditSubcata($id){
       $subcatainfo =  Subcata::find($id);
       $cataInfo = Catagory::orderBy('catagory_name_en', 'ASC')->get();

       return view('backend.subcata.edit', ['subcatainfo'=> $subcatainfo, 'cataInfo'=>$cataInfo]);

    }//Method End



    public function UpdateSubcata(Request $request){
        $request->validate([
            'subcata_name_en'=>'required',
            'subcata_name_hin'=>'required',
            'category_id'=>'required',
        ]);

        $result =  Subcata::where('id', $request->id )->update([
            'subcata_name_en'=>$request->subcata_name_en,
            'subcata_name_hin'=>$request->subcata_name_hin,
            'subcata_slug_en'=>strtolower(str_replace(' ', '-', $request->subcata_name_en)),
            'subcata_slug_hin'=>strtolower(str_replace(' ', '-', $request->subcata_name_hin)),
            'category_id'=> $request->category_id,
        ]);

        $success = [
            'type' => 'success',
            'message'=>'Sub Catagory updated successfully',
        ];

        return redirect()->route('subcata.view')->with($success);

    }

    public function DeleteSubcata($id){


        Subcata::destroy($id);

        return back();
    }//Method End
}
