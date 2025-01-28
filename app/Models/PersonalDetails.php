<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetails extends Model
{
    use HasFactory;
    public $table='user_personal_details';
    public $increment=true;  
    public $timestamp=true;



   

    
    protected $fillable = [
        'uid',
        'name',
        'phonenumber',
        'field_of_profession',
        'type_of_duty',
        'additional_contact_no',
        'permanent_address',
        'permanent_state',
        'permanent_district',
        'permanent_city',
        'permanent_pincode',
        'current_address',
        'current_state',
        'current_district',
        'current_city',
        'current_pincode',
        'employee_id',
    ];
}
