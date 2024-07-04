<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TupadInformation;
use App\Models\TupadEmployee;
use App\Models\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;

class TupadProjectController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        // Validate add tupad beneficiaries form
        $validator = Validator::make($request->all(), [
            'name_of_program' => ['nullable', 'string', 'max:255'],
            'name_of_office' => ['required', 'string', 'max:255'],
            'office_address' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:255'],
            'email_address' => ['required', 'email'],
            'region' => ['required', 'string', 'max:255'],
            'province' => ['required', 'in:Cagayan de Oro City,Misamis Oriental,Misamis Occidental,Bukidnon,Lanao Del Norte,Camiguin'],
            'total_budget' => ['required', 'numeric'],
            'description' => ['nullable', 'string', 'max:255'],
            'prepared_by' => ['required', 'string', 'max:255'],
            'period_of_project_end' => ['required', 'string', 'max:255'],
            'period_of_project_start' => ['required', 'string', 'max:255'],
            'remarks' => ['nullable', 'string', 'max:255'],
        ]);

        //dd($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // COUNT APPLICATION TO GET ID
        $ID = TupadInformation::get()->count();

        //REFERENCE NUMBER
        $reference_number = "RO10-TUPAD-".$date = date("Ymd")."-".$ID;

        // If the validation passes, continue with your logic here
        $Query = TupadInformation::Create([
            'project_reference' => $reference_number,
            'name_of_program' => $request->name_of_program,
            'name_of_office' => $request->name_of_office,
            'office_address' => $request->office_address,
            'contact_number' => $request->contact_number,
            'email_address' => $request->email_address,
            'province' => $request->province,
            'region' => $request->region,
            'total_budget' => $request->total_budget,
            'period_of_project_end' => $request->period_of_project_end,
            'period_of_project_start' => $request->period_of_project_start,
            'description' => $request->description,
            'prepared_by' => $request->prepared_by,
            'status' => 'PENDING',
            'remarks' => $request->remarks
        ]);

        $data = [
            'message_type' => 'success',
            'message' => 'Successfully added TUPAD Project. Thank you.',
            'action' => ''
        ];

        return view('admin.Tupad.message', $data);
    }

    public function show(Request $request)
    {
        // Fetch beneficiary
        $tupadProject = TupadInformation::find($request->id);

        // Fetch all tupad beneficiary with the same group id
        $tupadProjectBeneficiaries = TupadEmployee::where('tupad_id', '=', $tupadProject->id)->paginate(15);


       // $checkTupadProjectBeneficiaries = TupadEmployee::where('tupad_id', '=', $tupadProject->id)->get();

        $countProjectBeneficiaries = TupadEmployee::where('tupad_id', '=', $tupadProject->id)
        ->count();

        //dd($tupadProjectBeneficiaries[0]->first_name);

        //$duplicates = array();



        /*$getDuplicate = TupadEmployee::where('tupad_id', '=', $tupadProject->id)
            ->where('first_name', '=', $tupadProjectBeneficiaries[0]->first_name)
            //->where('middle_initial', '=', $tupadProjectBeneficiaries[$i]->middle_initial)
            ->where('last_name', '=', $tupadProjectBeneficiaries[0]->last_name)
            ->get();*/

            /*$b = TupadEmployee::where('tupad_id', '=', $tupadProject->id)
            ->where('first_name', '=', $tupadProjectBeneficiaries[0]->first_name)
            //->where('middle_initial', '=', $tupadProjectBeneficiaries[$i]->middle_initial)
            ->where('last_name', '=', $tupadProjectBeneficiaries[0]->last_name)
            ->first();*/

            /*$duplicates = DB::table('tupad_employees')
            ->select('first_name', DB::raw('COUNT(*) as count'))
            ->groupBy('first_name')
            ->having('count', '>', 1)
            ->get();*/

            //dd($duplicates);

        /*$i = 0;
        $duplicates = [];

        // Loop through all beneficiaries and check for duplicates.
        foreach ($checkTupadProjectBeneficiaries as $beneficiary) {
            // Check for duplicates based on 'tupad_id', 'first_name', and 'last_name'.
            $getDuplicate = TupadEmployee::where('id','!=', $beneficiary->id)
           // where('tupad_id','!=', $tupadProject->id)
                ->where('first_name', $beneficiary->first_name)
                ->where('last_name', $beneficiary->last_name)
                ->get();


            // Now you can process the duplicates found for the current beneficiary.
            // For example, you could check the count of $getDuplicate, and if it's greater than 1, it means duplicates exist.
            $duplicateCount = $getDuplicate->count();
            if ($duplicateCount > 1) {
                // Handle duplicates for this beneficiary.
                // You can access the duplicate records through $getDuplicate.
                // Example: $getDuplicate contains a collection of TupadEmployee model instances representing the duplicates found for the current beneficiary.
                // You can loop through $getDuplicate to access each duplicate record if needed.
                $duplicates[] = $getDuplicate;

                $i++;
            }
        }*/

        //dd($duplicates);




        $checkTupadProjectBeneficiaries = TupadEmployee::where('tupad_id', $tupadProject->id)->get();

        // Create an associative array to track duplicates based on 'first_name' and 'last_name'.
        $seenNames = [];
        $duplicate_id = [];

        // Array to store the duplicate TupadEmployee model instances.
        $duplicates = [];
        $duplicatesData = [];

        foreach ($checkTupadProjectBeneficiaries as $employee) {

            $countDuplicate = DB::table('tupad_employees')
            ->select('first_name', DB::raw('COUNT(*) as count'))
            ->where('first_name', '=', $employee->first_name)
            ->where('last_name', '=', $employee->last_name)
            ->groupBy('first_name')
            ->having('count', '>', 1)
            ->get();


            $checkIfDuplicateExist = TupadEmployee::where('id', '!=', $employee->id)
            ->where('first_name', '=', $employee->first_name)
            ->where('last_name', '=', $employee->last_name)
            ->first();

            if($checkIfDuplicateExist == NULL)
            {

            }
            else
            {
                $fullName = $employee->first_name . ' ' . $employee->middle_initial . ' ' . $employee->last_name . ' ' . $employee->name_extension;
                $fullNameDuplicate = $checkIfDuplicateExist->first_name . ' ' . $checkIfDuplicateExist->middle_initial . ' ' . $checkIfDuplicateExist->last_name . ' ' . $checkIfDuplicateExist->name_extension;
                // Check if the name already exists in the seenNames array.
                // Check if the name already exists in the $duplicates array.
                if (isset($duplicates[$fullName])) {
                    // We found a duplicate.
                    // Add the current employee's ID to the $duplicates array under the corresponding name.
                    //$duplicates[$fullName]; //= $employee->id;
                    //$duplicate_id[$employee->id];
                } else {
                    // First occurrence of the name, initialize the array with the current employee's ID.
                    $duplicates[] = [
                        'id' => $employee->id,
                        'name' => $fullName,
                        'count' => $countDuplicate[0]->count
                    ];

                    $duplicatesData[] = [
                        'id' => $checkIfDuplicateExist->id,
                        'name' => $fullNameDuplicate
                    ];
                }

            }


        }

        //dd($countDuplicate[0]->count);
        //dd($duplicatesData);
        //dd($duplicates);

        //dd($duplicates);
        //dd(sizeof($seenNames));
        //dd($seenNames);
        //dd($duplicates);

        // Now the $duplicates array contains the duplicate TupadEmployee model instances for the given $tupadProject->id.

        //dd($duplicates);


        // Navigate to
        return view('admin.Tupad.view-tupad-project-information', [
            'tupadProject' => $tupadProject,
            'tupadProjectBeneficiaries' => $tupadProjectBeneficiaries,
            'duplicates' => $duplicates,
            'duplicatesData' => $duplicatesData

        ]);
    }

    public function edit(Request $request)
    {
        // Fetch beneficiary
        $tupadProject = TupadInformation::find($request->id);

        // Navigate to
        return view('admin.Tupad.edit-tupad-project-information', compact('tupadProject'));
    }

    public function update(Request $request)
    {
        // Validate add tupad beneficiaries form
        $validator = Validator::make($request->all(), [
            'name_of_program' => ['nullable', 'string', 'max:255'],
            'name_of_office' => ['required', 'string', 'max:255'],
            'office_address' => ['required', 'string', 'max:255'],
            'contact_number' => ['required', 'string', 'max:255'],
            'email_address' => ['required', 'email'],
            'region' => ['required', 'string', 'max:255'],
            'province' => ['required', 'in:Cagayan de Oro City,Misamis Oriental,Misamis Occidental,Bukidnon,Lanao Del Norte,Camiguin'],
            'total_budget' => ['required', 'numeric'],
            'description' => ['required', 'string', 'max:255'],
            'prepared_by' => ['required', 'string', 'max:255'],
            'period_of_project_end' => ['required', 'string', 'max:255'],
            'period_of_project_start' => ['required', 'string', 'max:255'],
            'remarks' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $updateBeneficiary = DB::table('tupad_information')
        ->where('id', $request->id)
        ->update([
            'name_of_program' => $request->name_of_program,
            'name_of_office' => $request->name_of_office,
            'office_address' => $request->office_address,
            'contact_number' => $request->contact_number,
            'email_address' => $request->email_address,
            'province' => $request->province,
            'region' => $request->region,
            'total_budget' => $request->total_budget,
            'period_of_project_end' => $request->period_of_project_end,
            'period_of_project_start' => $request->period_of_project_start,
            'description' => $request->description,
            'prepared_by' => $request->prepared_by,
            'status' => 'PENDING',
            'remarks' => $request->remarks
        ]);

        $data = [
            'message_type' => 'success',
            'message' => 'Successfully Updated TUPAD Beneficiary Details. Thank you.',
            'action' => 'redirect-back-submit-beneficiary'
        ];

        return view('admin.Tupad.message', $data);
    }

    public function destroy()
    {

    }

    public function search(Request $request)
    {
        $contains = $request->input('contains');
        $searchTerm = $request->input('input_text');


        //dd($contains);
       // dd($searchTerm);


        if($contains == "Reference_Number")
        {
            $tupadProject = TupadInformation::where('project_reference', 'LIKE', '%' . $searchTerm . '%')->paginate(15);
        }

        if($contains == "total_budget")
        {
            $tupadProject = TupadInformation::where('total_budget', 'LIKE', '%' . $searchTerm . '%')->paginate(15);
        }

        if($contains == "Office_Name")
        {
            $tupadProject = TupadInformation::where('name_of_office', 'LIKE', '%' . $searchTerm . '%')->paginate(15);
        }

        if($contains == "Office_Address")
        {
            $tupadProject = TupadInformation::where('office_address', 'LIKE', '%' . $searchTerm . '%')->paginate(15);
        }

        return view('admin.Tupad.search-tupad-project-table', compact('tupadProject'));
    }

    public function evaluate(Request $request)
    {
        // Date Today
        $DateToday = Carbon::now()->toDateTimeString();
        $Date = date("Y-m-d");

        if($request->submit == "TSSD_REVIEW")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_TSSD' => $DateToday,
                'status' => 'APPROVED',
                'remarks' => $request->remarks
            ]);

            // Update Tupad Beneficiary/employee
            // $updateTupad = DB::table('tupad_employees')
            // ->where('id', $request->project_id)
            // ->update([
            //     'reviewed_by_TSSD' => $DateToday,
            //     'beneficiary_status' => 'APPROVED',
            //     'remarks' => $request->remarks
            // ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reviewed By TSSD. Thank you.',
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }

        if($request->submit == "IMSD_REVIEW")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_IMSD' => $DateToday,
                'remarks' => $request->remarks
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reviewed By IMSD. Thank you.',
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }

        if($request->submit == "BUDGET_REVIEW")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_BUDGET' => $DateToday,
                'remarks' => $request->remarks
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reviewed By Budget. Thank you.',
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }

        if($request->submit == "ACCOUNTING_REVIEW")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_ACCOUNTING' => $DateToday,
                'remarks' => $request->remarks
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reviewed By Accounting. Thank you.',
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }


        if($request->submit == "COA_REVIEW")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_COA' => $DateToday,
                'remarks' => $request->remarks
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reviewed By COA. Thank you.',
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }

        if($request->submit == "ARD_REVIEW")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_ARD' => $DateToday,
                'remarks' => $request->remarks
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reviewed By ARD. Thank you.',
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }

        if($request->submit == "RD_REVIEW")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_RD' => $DateToday,
                'remarks' => $request->remarks
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reviewed By ARD. Thank you.',
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }

        if($request->submit == "CASHIER_REVIEW")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_CASHIER' => $DateToday,
                'approved_date' => $DateToday,
                'status' => 'APPROVED',
                'remarks' => $request->remarks
            ]);

            // Update Tupad Project Beneficiaries
            $updateTupadEmployee = DB::table('tupad_employees')
            ->where('tupad_id', $request->project_id)
            ->update([
                'beneficiary_status' => 'APPROVED'
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reviewed By ARD. Thank you.',
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }

        if($request->submit == "DENIED")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_IMSD' => NULL,
                'reviewed_by_TSSD' => NULL,
                'reviewed_by_ORD' => NULL,
                'reviewed_by_COA' => NULL,
                'reviewed_by_CASHIER' => NULL,
                'reviewed_by_ACCOUNTING' => NULL,
                'reviewed_by_ARD' => NULL,
                'reviewed_by_RD' => NULL,
                'reviewed_by_PD' => NULL,
                'denied_date' => $Date,
                'status' => 'DENIED',
                'remarks' => $request->remarks
            ]);

            // Update Tupad Project Employee/Beneficiary
            $updateTupadEmployee = DB::table('tupad_employees')
            ->where('tupad_id', $request->project_id)
            ->update([
                'beneficiary_status' => 'DENIED'
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Denied By TSSD. Thank you.', //IMSD change to TSSD
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }

        if($request->submit == "RESET")
        {
            // Update Tupad Project
            $updateTupad = DB::table('tupad_information')
            ->where('id', $request->project_id)
            ->update([
                'reviewed_by_IMSD' => NULL,
                'reviewed_by_TSSD' => NULL,
                'reviewed_by_ORD' => NULL,
                'reviewed_by_COA' => NULL,
                'reviewed_by_CASHIER' => NULL,
                'reviewed_by_ACCOUNTING' => NULL,
                'reviewed_by_ARD' => NULL,
                'reviewed_by_RD' => NULL,
                'reviewed_by_PD' => NULL,
                'denied_date' => NULL,
                'status' => 'PENDING',
                'remarks' => $request->remarks
            ]);

            // Update Tupad Project Employee/Beneficiary
            $updateTupadEmployee = DB::table('tupad_employees')
            ->where('tupad_id', $request->project_id)
            ->update([
                'beneficiary_status' => 'PENDING'
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reset By TSSD. Thank you.',
                'action' => ''
            ];

            // Navigate To Tupad Message
            return view('admin.Tupad.message', $data);
        }



    }

    public function pendingTupadProject(Request $request)
    {
        /*
            IMSD - 3
            ORD - 4
            COA - 5
            CASHIER - 6
            ACCOUNTING - 7
            ARD - 8
            RD - 9
            CDO_PD - 10
            CAM_PD - 11
            BUK_PD - 12
            LAN_PD - 13
            MIS_OC_PD - 14
            MIS_OR_PD - 15
            TSSD - 16
            BUDGET_UNIT - 17
            ARD - 18


            TSSD - 16
            IMSD - 3
            BUDGET - 17
            ACCOUNTING - 7
            COA - 5
            ARD - 8
            RD - 9
            CASHIER - 6

            1 - Admin
            2 - User
            3 - IMSD
            4 - ORD
            5 - COA
            6 - CASHIER
            7 - ACCOUNTING
            8 - ARD
            9 - RD
            10 - CDO_PD
            11 - CAM_PD
            12 - BUK_PD
            13 - LAN_PD
            14 - MIS_OC_PD
            15 - MIS_OR_PD
            16 - TSSD
            17 - BUDGET_UNIT

        */



        // TSSD
        if(auth()->user()->role_id == 16)
        {
            // Fetch Tupad Information Pending
            $tupadProject = TupadInformation::where('status', '=', 'PENDING')
            ->where('reviewed_by_TSSD', '=', NULL)
            ->paginate(15);

            // Return with value Tupad Project
            return view('admin.Tupad.pending-tupad-information-data-table', ['tupadProject' => $tupadProject]);
        }

        // IMSD
        if(auth()->user()->role_id == 3)
        {
            // Fetch Tupad Information Pending
            $tupadProject = TupadInformation::where('status', '=', 'PENDING')
            ->where('reviewed_by_TSSD', '!=', NULL)
            ->paginate(15);

            // Return with value Tupad Project
            return view('admin.Tupad.pending-tupad-information-data-table', ['tupadProject' => $tupadProject]);
        }

        // BUDGET
        if(auth()->user()->role_id == 17)
        {
            // Fetch Tupad Information Pending
            $tupadProject = TupadInformation::where('status', '=', 'PENDING')
            ->where('reviewed_by_IMSD', '!=', NULL)
            ->paginate(15);

            // Return with value Tupad Project
            return view('admin.Tupad.pending-tupad-information-data-table', ['tupadProject' => $tupadProject]);
        }

        // ACCOUNTING
        if(auth()->user()->role_id == 7)
        {
            // Fetch Tupad Information Pending
            $tupadProject = TupadInformation::where('status', '=', 'PENDING')
            ->where('reviewed_by_BUDGET', '!=', NULL)
            ->paginate(15);

            // Return with value Tupad Project
            return view('admin.Tupad.pending-tupad-information-data-table', ['tupadProject' => $tupadProject]);
        }

        // COA
        if(auth()->user()->role_id == 5)
        {
            // Fetch Tupad Information Pending
            $tupadProject = TupadInformation::where('status', '=', 'PENDING')
            ->where('reviewed_by_ACCOUNTING', '!=', NULL)
            ->paginate(15);

            // Return with value Tupad Project
            return view('admin.Tupad.pending-tupad-information-data-table', ['tupadProject' => $tupadProject]);
        }

        // ARD
        if(auth()->user()->role_id == 8)
        {
            // Fetch Tupad Information Pending
            $tupadProject = TupadInformation::where('status', '=', 'PENDING')
            ->where('reviewed_by_COA', '!=', NULL)
            ->where('reviewed_by_ARD', '=', NULL)
            ->paginate(15);

            // Return with value Tupad Project
            return view('admin.Tupad.pending-tupad-information-data-table', ['tupadProject' => $tupadProject]);
        }

        // RD
        if(auth()->user()->role_id == 9)
        {
            // Fetch Tupad Information Pending
            $tupadProject = TupadInformation::where('status', '=', 'PENDING')
            ->where('reviewed_by_ARD', '!=', NULL)
            ->paginate(15);

            // Return with value Tupad Project
            return view('admin.Tupad.pending-tupad-information-data-table', ['tupadProject' => $tupadProject]);
        }

        // CASHIER
        if(auth()->user()->role_id == 6)
        {
            // Fetch Tupad Information Pending
            $tupadProject = TupadInformation::where('status', '=', 'PENDING')
            ->where('reviewed_by_RD', '!=', NULL)
            ->paginate(15);

            // Return with value Tupad Project
            return view('admin.Tupad.pending-tupad-information-data-table', ['tupadProject' => $tupadProject]);
        }



    }
}


