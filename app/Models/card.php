<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class card extends Model
{
    use HasFactory;

    // relation to product
    function rel_to_pro(){
        return $this->belongsTo(product::class, 'product_id');
    }
    // relation to size
    function rel_to_size(){
        return $this->belongsTo(ProductSize::class, 'product_id');
    }
}
