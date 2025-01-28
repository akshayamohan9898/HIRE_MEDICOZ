<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginData extends Model
{
    use HasFactory;
    public $table='login_data';
    public $increment=true;  
    public $timestamp=true;
    protected $fillable = [
        'email',
        'password',
        'user_type',
        'login_status',
        'phone_otp',
        'email_otp',
    ];
}
