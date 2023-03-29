<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productInventory extends Model
{
    use HasFactory;

    // relation to product
    function rel_to_pot(){
        return $this->belongsTo(product::class, 'product_id');
    }

    // relation to color
    function rel_to_col(){
        return $this->belongsTo(productColor::class, 'color_id');
    }

    // relation to size
    function rel_to_size(){
        return $this->belongsTo(ProductSize::class, 'size_id');
    }
    // relation to size
    function rel_to_sizenum(){
        return $this->belongsTo(productSizeN::class, 'sizen_id');
    }
}
