<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relation to category
    function rel_to_cat(){
       return $this->belongsTo(category::class, 'category_id');
    }
    // relation to subcategory
    function rel_to_subcat(){
       return $this->belongsTo(subcategory::class, 'subcategory_id');
    }
    // relation to brand
    function rel_to_brand(){
       return $this->belongsTo(brand::class, 'brand_id');
    }
}
