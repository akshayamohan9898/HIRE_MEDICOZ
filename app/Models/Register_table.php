<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register_table extends Model
{
    public $table='login_data';
    public $increment=true;  
    public $timestamp=false;
}
