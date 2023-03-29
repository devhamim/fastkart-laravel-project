<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    // product inventroy
    function rel_to_inv(){
        return $this->belongsTo(productInventory::class, 'size_id');
    }
}
