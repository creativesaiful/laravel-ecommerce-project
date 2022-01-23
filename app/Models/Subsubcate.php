<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subsubcate extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'subsubcata_name_en',
        'subsubcata_name_hin',
        'subsubcata_slug_en',
        'subsubcata_slug_hin'
    ];

    public function category(){
        return $this->belongsTo(Catagory::class, 'category_id', 'id');
    }

    public function subcategory(){
        return $this->belongsTo(Subcata::class, 'sub_category_id', 'id');
    }

}
