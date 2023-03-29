<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $guard = 'customer';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relation to country
    function rel_to_country(){
        return $this->belongsTo(countrie::class, 'country_id');
    }
    // relation to city
    function rel_to_city(){
        return $this->belongsTo(citie::class, 'city_id');
    }
}
