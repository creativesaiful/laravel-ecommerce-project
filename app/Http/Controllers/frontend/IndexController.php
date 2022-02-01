<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;
class IndexController extends Controller
{
   public function index(){
   $catagory =  Catagory::orderBy('catagory_name_en', 'ASC')->get();
       return view('frontend.index', ['catagory'=>$catagory]);
   }


}
