<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcata extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcata_name_en',
        'subcata_name_hin',
        'subcata_slug_en',
        'subcata_slug_hin',
    ];

    public function category(){
        return $this->belongsTo(Catagory::class, 'category_id', 'id');
    }
}
