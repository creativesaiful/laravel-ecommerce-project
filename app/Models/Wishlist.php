<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class Wishlist extends Model
{
    use HasFactory;

    public function productInfo(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
