<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'certificate_number', 'nid', 'passport', 'name',  'nationality', 'dob_day', 'dob_month', 'dob_year', 'gender', 'first_dose', 'second_dose', 'boster_dose', 'vaccine_name', 'vaccine_name_boster', 'vaccine_center', 'user', 'status'
    ];
}
