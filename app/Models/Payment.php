<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['insurance_id', 'account_number', 'payment_type', 'amount', 'user_id','invoice', 'trxID', 'status'];


    public function insurance() {
        return $this->belongsTo(Insurance::class, 'insurance_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
