<?php

namespace App\Imports;

use App\Models\Payment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InsurancePaymentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    
    public function model(array $row)
    {
        return new Payment([
            'Insurance_id' => $row['Insurance_id'],
            'account_number' => $row['account_number'],
            'payment_type' => $row['payment_type'],
        ]);
    }

    
}
