<?php

namespace App\Http\Controllers\Admin;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


use App\Http\Controllers\Controller;
use App\Models\TupadInformation;
use App\Models\TupadEmployee;
use App\Models\User;

use App\Exports\BeneficiariesExport;
use App\Exports\AllBeneficiariesExport;
use App\Exports\TupadInformationExport;
use App\Exports\TupadAllInformationExport;

use App\Imports\BeneficiariesImport;
use App\Models\FamilyMember;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;




use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TupadController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        // Fetch Project Information
        $checkReferenceProject= TupadInformation::where("project_reference", "=", $request->project_reference)->first();
        // dd($checkReferenceProject);

        if($checkReferenceProject == NULL)
        {
            $data = [
                'message_type' => 'error',
                'message' => 'Error. Reference Number does not exist.',
                'action' => 'redirect-back-submit-beneficiary'
            ];

            return view('admin.Tupad.message', $data);
        }
        else
        {
            // Validate add tupad beneficiaries form
            $validator = Validator::make($request->all(), [
                //beneficiary
                'contact_number' => ['required', 'string', 'max:255'],
                'email_address' => ['nullable', 'email'],
                'first_name' => ['required', 'string', 'max:255'],
                'middle_initial' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'name_extension' => ['nullable', 'string', 'max:255'],
                'date_of_birth' => ['required', 'date'],
                'age' => ['required', 'numeric'],
                'region' => ['required', 'string', 'max:255'],
                'province' => ['required', 'in:Cagayan de Oro City,Misamis Oriental,Misamis Occidental,Bukidnon,Lanao Del Norte,Camiguin'],
                // 'complete_address' => ['required', 'string', 'max:255'],
                'barangay' => ['required', 'string', 'max:255'],
                'street' => ['required', 'string', 'max:255'],
                'designated_beneficiary' => ['nullable', 'string', 'max:255'],
                'relationship_to_assured' => ['nullable', 'string', 'max:255'],
                'period_of_employment_start' => ['required', 'date'],
                'period_of_employment_end' => ['required', 'date'],
                'total_insurance_amount' => ['required', 'numeric'],
                'status' => ['nullable', 'string', 'max:255'],
                'remarks' => ['nullable', 'string', 'max:255'],
                'picture' => ['required','mimes:jpeg', 'max:20000'],
                'interviewed_by' => ['nullable', 'string', 'max:255'],

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $picture = $request->file('picture');
            $path = $picture->store('tupadBeneficiariesPicture');

            // If the validation passes, continue with your logic here
            $Query = TupadEmployee::Create([
                'tupad_id' => $checkReferenceProject->id,
                'first_name' => $request->first_name,
                'middle_initial' => $request->middle_initial,
                'last_name' => $request->last_name,
                'name_extension' => $request->name_extension,
                'contact_number' => $request->contact_number,
                'email_address' => $request->email_address,
                'date_of_birth' => $request->date_of_birth,
                'age' => $request->age,
                'region' => 'REGION 10 ONLY',
                'province' => $request->province,
                'barangay' => $request->barangay,
                'street' => $request->street,
                'postal_code' => $request->postal_code,
                'designated_beneficiary' => $request->designated_beneficiary,
                'relationship_to_assured' => $request->relationship_to_assured,
                'period_of_employment_start' => $request->period_of_employment_start,
                'period_of_employment_end' => $request->period_of_employment_end,
                'total_insurance_amount' => $request->total_insurance_amount,
                'beneficiary_type' => $request->beneficiary_type,
                'beneficiary_status' => 'PENDING', //$request->beneficiary_status,
                'file_name' => 'Picture 2x2',
                'file_path' => basename($path),
                'status' => $request->status,
                'remarks' => $request->remarks,
                'interviewed_by' => $request->interviewed_by,
            ]);


            $data = [
                'message_type' => 'success',
                'message' => 'Successfully added TUPAD Beneficiary. Thank you.',
                'action' => 'redirect-back-submit-beneficiary'
            ];

            return view('admin.Tupad.message', $data);
        }


    }

    public function storeMember(Request $request)
    {
        // Fetch Project Information
        $checkEmployeeID= TupadEmployee::where("id", "=", $request->id)->first();
        // dd($checkEmployeeID);

        // dd($request);

        if($checkEmployeeID == NULL)
        {
            $data = [
                'message_type' => 'error',
                'message' => 'Error. Benefeciary ID Number does not exist.',
                'action' => 'redirect-back-submit-beneficiary'
            ];

            return view('admin.Tupad.message', $data);
        }
        else
        {
            // Validate add tupad beneficiaries form
            $validator = Validator::make($request->all(), [
                //beneficiary
                'Family_Fname' => ['required', 'string', 'max:255'],
                'Family_Mname' => ['required', 'string', 'max:255'],
                'Family_Lname' => ['required', 'string', 'max:255'],
                'Family_gender' => ['required', 'string', 'max:255'],
                'Family_age' => ['required', 'string', 'max:255'],
                'Family_birth' => ['required', 'date'],
                'Family_mobile' => ['required', 'string', 'max:255'],
                'Family_Cstatus' => ['required', 'string', 'max:255'],
                'Family_address' => ['required', 'string', 'max:255'],
                'Family_Relationship' => ['required', 'string', 'max:255'],


            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // If the validation passes, continue with your logic here

            FamilyMember::Create([
                'employee_id' => $checkEmployeeID->id,
                'Family_Fname' => $request->Family_Fname,
                'Family_Mname' => $request->Family_Mname,
                'Family_Lname' => $request->Family_Lname,
                'Family_gender' => $request->Family_gender,
                'Family_age' => $request->Family_age,
                'Family_birth' => $request->Family_birth,
                'Family_mobile' => $request->Family_mobile,
                'Family_Cstatus' => $request->Family_Cstatus,
                'Family_address' => $request->Family_address,
                'Family_Relationship' => $request->Family_Relationship,
            ]);

            $data = [
                'message_type' => 'success',
                'message' => 'Successfully added TUPAD Family Member. Thank you.',
                'action' => 'redirect-back-submit-beneficiary'
            ];

            return view('admin.Tupad.message', $data);
        }


    }

    public function show(Request $request)
    {
        // Fetch beneficiary
        // $beneficiary = TupadEmployee::find($request->id);


        // //Fetch Family Member
        // $familyMember = FamilyMember::find($request->id);
        // // dd($familyMember);

        // // Fetch beneficiary
        // $tupadProject = TupadInformation::find($request->id);

        // // Fetch all tupad beneficiary with the same tupad id
        // $tupadBeneficiaries = TupadEmployee::where('tupad_id', '=', $beneficiary->tupad_id)->paginate(15);
        // //dd($tupadBeneficiaries);

        // //fectch all family member with family id
        // $beneficiaryFamily = FamilyMember::where('employee_id', '=', $familyMember->id)->paginate(3);
        // // dd($beneficiaryFamily);

        // // Navigate to
        // return view('admin.Tupad.view-beneficiary-information', [
        //     'beneficiary' => $beneficiary,
        //     'tupadBeneficiaries' => $tupadBeneficiaries,
        //     'tupadProject' => $tupadProject,
        //     'familyMember' => $familyMember,
        //     'beneficiaryFamily' => $beneficiaryFamily
        // ]);

        //Fetch beneficiary
        $beneficiary = TupadEmployee::find($request->id);

        // Fetch Family Member if beneficiary found
        $familyMember = null;
        if ($beneficiary) {
            $familyMember = FamilyMember::find($request->id);
        }

        // Fetch Tupad Project
        $tupadProject = TupadInformation::find($request->id);

        // Fetch all tupad beneficiaries with the same tupad id
        $tupadBeneficiaries = TupadEmployee::where('tupad_id', '=', $beneficiary->tupad_id)->paginate(15);

        // Fetch all family members with the same employee_id
        $beneficiaryFamily = [];
        if ($familyMember) {
            $beneficiaryFamily = FamilyMember::where('employee_id', '=', $familyMember->id)->paginate(10);
        }

        // Return view with data
        return view('admin.Tupad.view-beneficiary-information', [
            'beneficiary' => $beneficiary,
            'tupadBeneficiaries' => $tupadBeneficiaries,
            'tupadProject' => $tupadProject,
            'familyMember' => $familyMember,
            'beneficiaryFamily' => $beneficiaryFamily
        ]);
    }


    public function search(Request $request)
    {

        $contains = $request->input('contains');
        $searchTerm = $request->input('input_text');

        // Initialize $results with an empty instance of LengthAwarePaginator
        $results = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 5);

        if ($contains == "ID")
        {
            $results = TupadEmployee::where('id', '=', $searchTerm)->paginate(50);
        }
        elseif ($contains == "Contact_Number")
        {
            $results = TupadEmployee::where('contact_number', 'LIKE', '%' . $searchTerm . '%')->paginate(50);
            //dd($results);
        }
        elseif ($contains == "Email")
        {
            $results = TupadEmployee::where('email_address', 'LIKE', '%' . $searchTerm . '%')->paginate(50);
        }
        elseif ($contains == "First_Name")
        {
            $results = TupadEmployee::where('first_name', '=', $searchTerm)->paginate(50);
        }
        elseif ($contains == "Last_Name")
        {
            $results = TupadEmployee::where('last_name', '=', $searchTerm)->paginate(50);
        }elseif ($contains == "Status")
        {
            $results = TupadEmployee::where('beneficiary_status', '=', $searchTerm)->paginate(50);
        }
        else
        {
            $results = TupadEmployee::where('last_name', '=', $searchTerm)->paginate(50);
        }

        return view('admin.Tupad.search-tupad-beneficiaries-table', ['results' => $results]);
    }

    public function edit(Request $request)
    {
        // Fetch beneficiary
        $beneficiary = TupadEmployee::find($request->id);
        // dd($beneficiary);

        // Navigate to
        return view('admin.Tupad.edit-beneficiary-information', compact('beneficiary'));
    }

    public function editFamilyMember(Request $request)
    {
        // Fetch beneficiary
        $familyMember = FamilyMember::find($request->id);
        // dd($familyMember);

        // $beneficiary = TupadEmployee::find($request->id);
        // dd($beneficiary);

        // if($beneficiary == $beneficiary->id && $familyMember == $familyMember->employee_id){
        //     // Navigate to
        //     return view('admin.Tupad.view-family-member-information', compact('familyMember','beneficiary'));
        // }
        return view('admin.Tupad.view-family-member-information', compact('familyMember'));


    }



    public function update(Request $request)
    {
        // Validate add tupad beneficiaries form
        $validator = Validator::make($request->all(), [
            /*'contact_number' => ['required', 'string', 'max:255'],
            'email_address' => ['nullable', 'email'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_initial' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'name_extension' => ['nullable', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'age' => ['required', 'numeric'],
            'region' => ['required', 'string', 'max:255'],
            'complete_address' => ['required', 'string', 'max:255'],
            'designated_beneficiary' => ['nullable', 'string', 'max:255'],
            'relationship_to_assured' => ['nullable', 'string', 'max:255'],
            'period_of_employment_start' => ['required', 'date'],
            'period_of_employment_end' => ['required', 'date'],
            'total_insurance_amount' => ['required', 'numeric'],
            'status' => ['nullable', 'string', 'max:255'],
            'remarks' => ['nullable', 'string', 'max:255'],
            'picture' => ['nullable','mimes:jpeg', 'max:20000'],*/
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $updateBeneficiary = DB::table('tupad_employees')
        ->where('id', $request->id)
        ->update([
            'first_name' => $request->first_name,
            'middle_initial' => $request->middle_initial,
            'last_name' => $request->last_name,
            'name_extension' => $request->name_extension,
            'contact_number' => $request->contact_number,
            'email_address' => $request->email_address,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'region' => 'REGION 10 ONLY',
            'province' => $request->province,
            'barangay' => $request->barangay,
            'street' => $request->street,
            'postal_code' => $request->postal_code,
            'designated_beneficiary' => $request->designated_beneficiary,
            'relationship_to_assured' => $request->relationship_to_assured,
            'period_of_employment_start' => $request->period_of_employment_start,
            'period_of_employment_end' => $request->period_of_employment_end,
            'total_insurance_amount' => $request->total_insurance_amount,
            'beneficiary_type' => $request->beneficiary_type,
            'beneficiary_status' => 'PENDING', //$request->beneficiary_status,
            'status' => $request->status,
            'remarks' => $request->remarks,
            'interviewed_by' => $request->interviewed_by,
        ]);

        $data = [
            'message_type' => 'success',
            'message' => 'Successfully Updated TUPAD Beneficiary Details. Thank you.',
            'action' => ''
        ];

        return view('admin.Tupad.message', $data);

    }

    public function updateFamilyMember(Request $request)
    {
        // Validate add tupad beneficiaries form
        // $validator = Validator::make($request->all(), [
        //     'Family_Fname' => ['required', 'string', 'max:255'],
        //     'Family_Mname' => ['required', 'string', 'max:255'],
        //     'Family_Lname' => ['required', 'string', 'max:255'],
        //     'Family_gender' => ['required', 'string', 'max:255'],
        //     'Family_age' => ['required', 'string', 'max:255'],
        //     'Family_birth' => ['required', 'date'],
        //     'Family_mobile' => ['required', 'string', 'max:255'],
        //     'Family_Cstatus' => ['required', 'string', 'max:255'],
        //     'Family_address' => ['required', 'string', 'max:255'],
        //     'Family_Relationship' => ['required', 'string', 'max:255'],

        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $updateFamily = DB::table('family_members')
        ->where('id', $request->id)
        ->update([
            'Family_Fname' => $request->Family_Fname ,
            'Family_Mname' => $request->Family_Mname ,
            'Family_Lname' => $request->Family_Lname ,
            'Family_gender' => $request->Family_gender ,
            'Family_age' => $request->Family_age ,
            'Family_birth' => $request->Family_birth ,
            'Family_mobile' => $request->Family_mobile ,
            'Family_Cstatus' => $request->Family_Cstatus ,
            'Family_address' => $request->Family_address ,
            'Family_Relationship' => $request->Family_Relationship ,
        ]);
        // dd($updateFamily);

        if($updateFamily){
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated Family Information Details. Thank you.',
                'action' => ''
            ];
        }else{
            $data = [
                'message_type' => 'error!',
                'message' => 'Unsuccessfully Updated Family Information Details. Sorry!.',
                'action' => ''
            ];
        }


        return view('admin.Tupad.message', $data);

    }



    public function destroy()
    {

    }

    public function search_tupad_info(Request $request)
    {

    }

    public function exportBeneficiaries(Request $request)
    {
        return Excel::download(new BeneficiariesExport($request), 'TupadBeneficiaries.xlsx');
        //return Excel::download(new TupadBeneficiariesExport, 'TupadBeneficiaries.xlsx');
    }

    public function exportAllBeneficiaries(Request $request)
    {
        return Excel::download(new AllBeneficiariesExport($request), 'AllTupadBeneficiaries.xlsx');
        //return Excel::download(new TupadBeneficiariesExport, 'TupadBeneficiaries.xlsx');
    }

    public function export_AllTupadBeneficiaries(Request $request)
    {
        return Excel::download(new AllBeneficiariesExport($request), 'AllTupadBeneficiaries.xlsx');
        //return Excel::download(new TupadBeneficiariesExport, 'TupadBeneficiaries.xlsx');
    }

    public function exportTupadInformation(Request $request)
    {
        return Excel::download(new TupadInformationExport($request), 'TupadInformation.xlsx');
    }

    public function exportAllTupadInformation(Request $request)
    {
        return Excel::download(new TupadAllInformationExport($request), 'TupadAllInformation.xlsx');
    }

    public function importBeneficiaries(Request $request)
    {
        //return Excel::import(new BeneficiaryImport($request->project_id), request()->file('excel_file'));

        //Excel::import(new BeneficiaryImport($request->project_id), $request->file('file')->store('app/public/excel/benes.xlsx'));

        //$path = storage_path('app/public/Book1.xlsx'); // Replace with your Excel file path

        //Excel::import(new BeneficiaryImport($request->project_id), $path);

        //Excel::import(new BeneficiaryImport, $request->file);

        //return redirect()->route('users.index')->with('success', 'User Imported Successfully');

        //Excel::import(new BeneficiaryImport, $request->file);

        Excel::import(new BeneficiariesImport($request->project_id), request()->file('file'));


        $data = [
            'message_type' => 'success',
            'message' => 'Successfully Import TUPAD Beneficiaries. Thank you.'.$request->file."",
            'action' => ''
        ];

        return view('admin.Tupad.message', $data);
    }

    public function evaluate(Request $request){
        // Date Today
        $DateToday = Carbon::now()->toDateTimeLocalString();

        //Approved
        if($request->submit == "TSSD_REVIEW"){
            DB::table('tupad_employees')
            ->where('id', $request->beneficiary_id)
            ->update([
                'reviewed_by_TSSD' => $DateToday,
                'beneficiary_status' => 'APPROVED',
                'remarks' => $request->remarks
            ]);

            // Store Data
            $data = [
                'message_type' => 'success',
                'message' => 'Successfully Updated TUPAD Project Reviewed By TSSD. Thank you.',
                'action' => ''
            ];

            //Navigate to Tupad Message
            return view('admin.Tupad.message', $data);

        }

        if($request->submit == "DENIED")
        {

            // Update Tupad Project Employee/Beneficiary
            DB::table('tupad_employees')
            ->where('id', $request->beneficiary_id)
            ->update([
                'reviewed_by_TSSD' => $DateToday,
                'beneficiary_status' => 'DENIED',
                'remarks' => $request->remarks
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

    }

}
