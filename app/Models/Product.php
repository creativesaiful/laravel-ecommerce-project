<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Catagory;
use App\Models\Brand;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category(){
    	return $this->belongsTo(Catagory::class,'category_id','id');
    }


    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }
}
