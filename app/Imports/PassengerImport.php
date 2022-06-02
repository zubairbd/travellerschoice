<?php

namespace App\Imports;

use App\Models\Passenger;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PassengerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
    public function getUpdatedAtAttribute($date)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d:m:Y');
}
    
    public function model(array $row)
    {
        $randomId       =   rand(2,9);
        $passengerId = IdGenerator::generate(['table' => 'passengers', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        $weCare = IdGenerator::generate(['table' => 'passengers', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 10, 'prefix' =>'WC-167542']);
        $PolicyNumber = $passengerId.$randomId;
        return new Passenger([
            'policy_number' => $PolicyNumber,
            'name' => $row['name'],
            'pp_number' => $row['pp_number'],
            'dob' => $this->transformDate($row['dob']),
            'destination' => $row['destination'],
            'effective_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['effective_date']),
            'termination_date' => $this->transformDate($row['termination_date']),
            'insurance_type' => $row['insurance_type'],
            'creator' => $row['creator'],
        ]);
    }

    
}
