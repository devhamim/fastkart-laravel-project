<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // category relation
    function rel_to_cat(){
        return $this->belongsTo(category::class, 'category_id');
    }
}
