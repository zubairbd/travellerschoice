<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'account_number',
        'account_name',
        'remark',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
