<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


     // relation to order producr
     function rel_to_orpro(){
        return $this->hasMany(orderProduct::class, 'order_id');
     }
}
