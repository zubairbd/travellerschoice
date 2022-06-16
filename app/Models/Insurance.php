<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    public $fillable = ['policy_number', 'name', 'dob', 'pp_number', 'effective_date', 'termination_date', 'destination', 'mobile', 'insurance_type', 'status', 'creator'];
    
    public function payments() {
        return $this->hasOne(Payment::class, 'insurance_id');
      }
}
