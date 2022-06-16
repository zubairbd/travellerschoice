<?php

namespace App\Imports;

use App\Models\Insurance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class InsuranceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function transformDate($value, $format = 'm-d-Y')
    {
        try {
            return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
        } catch (\ErrorException $e) {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
    public function getUpdatedAtAttribute($date)
{
    return \Carbon\Carbon::createFromFormat('m-d-Y', $date)->format('d:m:Y');
}
    
    public function model(array $row)
    {
        // $randomId       =   rand(2,9);
        // $InsuranceId = IdGenerator::generate(['table' => 'Insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        // $weCare = IdGenerator::generate(['table' => 'Insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 10, 'prefix' =>'WC-167542']);
        // $PolicyNumber = $InsuranceId.$randomId;
        $randomId       =   rand(2,9);
        $worldTrips = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        $weCare = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 9, 'prefix' =>'WC-93']);

        if($row['insurance_type'] == 'Worldtrips'){
            return new Insurance([
                'policy_number' => $worldTrips.$randomId,
                'name' => $row['name'],
                'pp_number' => $row['pp_number'],
                'dob' => $this->transformDate($row['dob']),
                'destination' => $row['destination'],
                'effective_date' => $this->transformDate($row['effective_date']),
                'termination_date' => $this->transformDate($row['termination_date']),
                'insurance_type' => $row['insurance_type'],
                'creator' => $row['creator'],
            ]);
        }elseif($row['insurance_type'] == 'WeCare'){
            
            return new Insurance([
                'policy_number' => $weCare.$randomId,
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

    
}
