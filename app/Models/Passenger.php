<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    public $fillable = ['policy_number', 'name', 'dob', 'pp_number', 'effective_date', 'termination_date', 'destination', 'mobile', 'insurance_type', 'status', 'creator'];
    
    // public function getCreatedAtAttribute($value)
    // {
    //     $date = \Carbon\Carbon::parse($value);
    //     return $date->format('dd-mm-yy');
    // }


    public function payments() {
        return $this->hasOne(Payment::class, 'passenger_id');
      }

}
