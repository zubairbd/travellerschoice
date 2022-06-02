<?php

namespace App\Imports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PassengerPaymentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    
    public function model(array $row)
    {
        return new Payment([
            'passenger_id' => $row['passenger_id'],
            'account_number' => $row['account_number'],
            'payment_type' => $row['payment_type'],
        ]);
    }

    
}
