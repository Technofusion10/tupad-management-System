<?php

namespace App\Exports;

use App\Models\TupadInformation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TupadAllInformationExport implements FromCollection, ShouldAutoSize, WithHeadingRow, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // protected $id;

    // public function __construct(Request $request)
    // {
    //     $this->id = $request->id;
    // }

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
        return TupadInformation::select(
            'id',
            'project_reference',
            'name_of_program',
            'name_of_office',
            'office_address',
            'contact_number',
            'email_address',
            'province',
            'region',
            'total_budget',
            'reviewed_by_IMSD',
            'reviewed_by_TSSD',
            'reviewed_by_ORD',
            'reviewed_by_COA',
            'reviewed_by_CASHIER',
            'reviewed_by_BUDGET',
            'reviewed_by_ACCOUNTING',
            'reviewed_by_ARD',
            'reviewed_by_RD',
            'reviewed_by_PD',
            'period_of_project_start',
            'period_of_project_end',
            'approved_date',
            'denied_date',
            'description',
            'prepared_by',
            'reason_for_denied',
            'status',
            'remarks',
            'created_at',
            'updated_at'
            )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'PROJECT REFERENCES',
            'PROGRAM',
            'OFFICE',
            'OFFICE ADDRESS',
            'CONTACT #',
            'EMAIL ADDRESS',
            'PROVINCE',
            'REGION',
            'TOTAL BUDGET AMOUNT',
            'REVIEIWED BY IMSD',
            'REVIEIWED BY TSSD',
            'REVIEIWED BY ORD',
            'REVIEIWED BY COA',
            'REVIEIWED BY CASHIER',
            'REVIEIWED BY BUDGET',
            'REVIEIWED BY ACCOUNTING',
            'REVIEIWED BY ARD',
            'REVIEIWED BY RD',
            'REVIEIWED BY PD',
            'PERIOD OF EMPLOYMENT START',
            'PERIOD OF EMPLOYMENT END',
            'DATE APPROVED',
            'DATE DENIED',
            'DESCRIPTION',
            'PREPARED BY',
            'REASON FOR DENIED',
            'STATUS',
            'REMARKS',
            'CREATED AT',
            'UPDATED AT',
        ];

    }
}
