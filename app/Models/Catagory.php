<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'catagory_name_en',
        'catagory_name_hin',
        'catagory_slug_en',
        'catagory_slug_hin',
        'catagory_icon',
    ];
}
