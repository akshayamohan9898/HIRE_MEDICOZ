<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalDetail extends Model
{
    use HasFactory;
    public $table='user_educational_details';
    public $increment=true;  
    public $timestamp=true;

    protected $fillable = [
        'course',
        'registration_number',
        'passout_year',
        'uid',
        'college',
        'certificate',
        'specialization',
        ''
    ];
}
