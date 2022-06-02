<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $fillable = ['passenger_id', 'account_number', 'payment_type'];


    public function passenger() {
        return $this->belongsTo(Passenger::class);
    }
}
