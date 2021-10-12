<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Managepassword extends Model
{
    use HasFactory;

    protected $table = 'manage_password';
    public $timestamps = false;

    protected $fillable = [
        'login_url',
        'username',
        'password',
        'userids',
    ];
}
