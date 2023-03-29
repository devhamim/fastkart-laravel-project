<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderProduct extends Model
{
    use HasFactory;


    protected $guarded = ['id'];

    // relation to product
    function rel_to_pro(){
        return $this->belongsTo(product::class, 'product_id');
    }
    // relation to order
    function rel_to_order(){
        return $this->belongsTo(order::class, 'order_id');
    }

}
