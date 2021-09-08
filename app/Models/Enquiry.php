<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;
          protected $table = 'enquiry';

           protected $fillable = [
            'business_id',
            'service_id',
            'user_id',
            'selected_date'
            ];
}
