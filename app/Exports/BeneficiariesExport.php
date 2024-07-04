<?php

namespace App\Exports;

use App\Models\TupadEmployee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BeneficiariesExport implements FromCollection, ShouldAutoSize, WithHeadingRow, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    public function __construct(Request $request)
    {
        $this->id = $request->id;
    }

    public function collection()
    {
        //return TupadEmployee::where('tupad_id', $this->id)->get();
        /*return DB::table('tupad_beneficiaries')
        ->where('group_id', $request->id)
        ->get();*/
        //->select('column1', 'column2', 'column3');

        ## 1. Export all data
        // return Employees::all();

        ## 2. Export specific columns
        return TupadEmployee::select(
            'id',
            'tupad_id',
            'first_name',
            'middle_initial',
            'last_name',
            'name_extension',
            'contact_number',
            'email_address',
            'date_of_birth',
            'age',
            'region',
            'province',
            'barangay',
            'postal_code',
            'street',
            'designated_beneficiary',
            'relationship_to_assured',
            'period_of_employment_start',
            'period_of_employment_end',
            'total_insurance_amount',
            'beneficiary_type',
            'beneficiary_status',
            'status',
            'remarks',
            'created_at',
            'updated_at'
            )
        ->where('tupad_id', $this->id)
        ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'TUPAD ID',
            'FIRST NAME',
            'MIDDLE INITIAL',
            'LAST NAME',
            'NAME EXTENSION',
            'CONTACT NUMBER',
            'EMAIL ADDRESS',
            'DATE OF BIRTH',
            'AGE',
            'REGION',
            'PROVINCE',
            'BARANGAY',
            'POSTAL CODE',
            'STREET',
            'DESIGNATED BENEFICIARY',
            'RELATIONSHIP TO ASSURED',
            'PERIOD OF EMPLOYMENT START',
            'PERIOD OF EMPLOYMENT END',
            'TOTAL INSURANCE AMOUNT',
            'BENEFICIARY TYPE',
            'BENEFICIARY STATUS',
            'STATUS',
            'REMARKS',
            'CREATED AT',
            'UPDATED AT'
        ];

        /*return [
            'ID',
            'GROUP ID',
            'PROGRAM',
            'OFFICE',
            'OFFICE ADDRESS',
            'CONTACT #',
            'EMAIL',
            'FIRST NAME',
            'MIDDLE INITIAL',
            'LAST NAME',
            'NAME EXTENSION',
            'DATE OF BIRTH',
            'AGE',
            'REGION',
            'PROVINCE',
            'COMPLETE ADDRESS',
            'DESIGNATED',
            'RELATIONSHIP TO ASSURED',
            'PERIOD OF EMPLOYMENT START',
            'PERIOD OF EMPLOYMENT END',
            'TOTAL INSURANCE AMOUNT',
            'PREPARED BY',
            'BENEFICIARY TYPE',
            'BENEFICIARY STATUS',
            'REVIEIWED BY IMSD',
            'REVIEIWED BY TSSD',
            'REVIEIWED BY ORD',
            'REVIEIWED BY COA',
            'REVIEIWED BY CASHIER',
            'REVIEIWED BY ACCOUNTING',
            'REVIEIWED BY ARD',
            'REVIEIWED BY RD',
            'REVIEIWED BY PD',
            'DATE APPROVED',
            'DATE DENIED',
            'STATUS',
            'REMARKS',
            'created_at',
            'updated_at',
        ];*/
    }
}
