<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
       protected $table = 'business_details';

           protected $fillable = [
        'business_name',
        'business_type',
        'user_id',
        'business_action_button',
        'business_description',
        'slug',
        'business_description',
        'area',
        'city',
        'state',
        'country',
        'working_hours',
        'address_line',
        'cover_photo',
        'service_id'
    ];


}
