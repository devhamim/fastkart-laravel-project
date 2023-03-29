<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billingdetails extends Model
{
    use HasFactory;

    // relation to city
    function rel_to_city(){
        return $this->belongsTo(citie::class, 'city_id');
    }
    // relation to city
    function rel_to_country(){
        return $this->belongsTo(countrie::class, 'country_id');
    }
}
