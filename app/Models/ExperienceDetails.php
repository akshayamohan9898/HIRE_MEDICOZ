<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceDetails extends Model
{
    use HasFactory;
    public $table='user_experience_details';
    public $increment=true;  
    public $timestamp=true;

    protected $fillable = [
        
        'organization',
        'duration',
        'duration_type',
        'description',
        'uid',
        'experience_certificate'

    ];

}
