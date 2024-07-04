<?php

namespace App\Imports;

use App\Models\TupadEmployee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class BeneficiariesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $targetId;

    public function __construct($targetId)
    {
        $this->targetId = $targetId;
    }

    public function model(array $row)
    {
        return new TupadEmployee([
            'tupad_id' => $this->targetId, //$row['tupad_id'],
            'first_name' => $row['first_name'],
            'middle_initial' => $row['middle_initial'],
            'last_name' => $row['last_name'],
            'name_extension' => $row['name_extension'],
            'contact_number' => $row['contact_number'],
            'email_address' => $row['email_address'],
            'date_of_birth' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_of_birth'])->format('Y-d-m'), //$row['date_of_birth'],
            'age' => $row['age'],
            'region' => $row['region'],
            'province' => $row['province'],
            'complete_address' => $row['complete_address'],
            'designated_beneficiary' => $row['designated_beneficiary'],
            'relationship_to_assured' => $row['relationship_to_assured'],
            'period_of_employment_start' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['period_of_employment_start'])->format('Y-d-m'), //$row['period_of_employment_start'],
            'period_of_employment_end' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['period_of_employment_end'])->format('Y-d-m'), //$row['period_of_employment_end'],
            'total_insurance_amount' => $row['total_insurance_amount'],
            'beneficiary_type' => $row['beneficiary_type'],
            'beneficiary_status' => $row['beneficiary_status'],
            'file_name' => $row['file_name'],
            'file_path' => $row['file_path'],
            'status' => $row['status'],
            'remarks' => $row['remarks'],
            'created_at' => $current_date_time = Carbon::now()->toDateTimeString(), //$row['created_at'],
            'updated_at' => $current_date_time = Carbon::now()->toDateTimeString(), //$row['updated_at'],
        ]);
    }
}

/*
$todayDate = Carbon::now()->format('Y-m-d');
YYYY-MM-DD hh:mm:ss
'tupad_id' => 1,
            'first_name' => $row['first_name'],
            'middle_initial' => $row['middle_initial'],
            'last_name' => $row['last_name'],
            'name_extension' => $row['name_extension'],
            'contact_number' => $row['contact_number'],
            'email_address' => $row['email_address'],
            'date_of_birth' => $row['date_of_birth'],
            'age' => $row['age'],
            'region' => $row['region'],
            'province' => $row['province'],
            'complete_address' => $row['complete_address'],
            'designated_beneficiary' => $row['designated_beneficiary'],
            'relationship_to_assured' => $row['relationship_to_assured'],
            'period_of_employment_start' => $row['period_of_employment_start'],
            'period_of_employment_end' => $row['period_of_employment_end'],
            'total_insurance_amount' => $row['total_insurance_amount'],
            'beneficiary_type' => $row['beneficiary_type'],
            'beneficiary_status' => $row['beneficiary_status'],
            'file_name' => $row['file_name'],
            'file_path' => $row['file_path'],
            'status' => $row['status'],
            'remarks' => $row['remarks'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],








            'tupad_id' => $row[0],
            'first_name' => $row[1],
            'middle_initial' => $row[1],
            'last_name' => $row[1],
            'name_extension' => $row[1],
            'contact_number' => $row[1],
            'email_address' => $row[1],
            'date_of_birth' => $row[1],
            'age' => $row[1],
            'region' => $row[1],
            'province' => $row[1],
            'complete_address' => $row[1],
            'designated_beneficiary' => $row['designated_beneficiary'],
            'relationship_to_assured' => $row['relationship_to_assured'],
            'period_of_employment_start' => $row['period_of_employment_start'],
            'period_of_employment_end' => $row['period_of_employment_end'],
            'total_insurance_amount' => $row['total_insurance_amount'],
            'beneficiary_type' => $row['beneficiary_type'],
            'beneficiary_status' => $row['beneficiary_status'],
            'file_name' => $row['file_name'],
            'file_path' => $row['file_path'],
            'status' => $row['status'],
            'remarks' => $row['remarks'],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
*/
