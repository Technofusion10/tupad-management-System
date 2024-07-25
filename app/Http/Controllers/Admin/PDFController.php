<?php

namespace App\Http\Controllers\Admin;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\TupadAnnouncement;
use App\Models\TupadInformation;
use App\Models\TupadEmployee;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use PDF;

class PDFController extends Controller
{
    public function generatePDF()
    {

    }

    public function tupadBeneficiary(Request $request)
    {
        // Fetch beneficiary
        $beneficiary = TupadEmployee::find($request->id);

        $encrypted = Crypt::encryptString($beneficiary->id);
        //print_r($encrypted);

        //$decrypt= Crypt::decryptString('your_encrypted_string_here');
        //print_r($decrypt);

        $qrcode = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate('http://e-dilpms.dolexportal.com/Identification/'.$encrypted));

        $data = [
            'beneficiary'=> $beneficiary,
            'id' => $beneficiary->id,
            'first_name' => $beneficiary->first_name,
            'middle_initial' => $beneficiary->middle_initial,
            'last_name' => $beneficiary->last_name,
            'name_extension' => $beneficiary->name_extension,
            'birthdate' => $beneficiary->date_of_birth,
            'barangay' => $beneficiary->barangay,
            'street' => $beneficiary->street,
            'province' => $beneficiary->province,
            'postal_code' => $beneficiary->postal_code,
            'file_path' => $beneficiary->file_path,
            'file_capture' => $beneficiary->file_capture,
            'date_today' => date('m/d/Y'),
            'qrcode' => $qrcode
        ];

        // dd($data);

        //$pdf = PDF::loadView('main.inventory.view_pdf', compact('qrcode'));
        //return $pdf->stream();
        //$pdf = PDF::loadView('admin.Tupad.tupad-beneficiary-identification-card', $data);

        $pdf = FacadePdf::loadView('admin.Tupad.tupad-beneficiary-identification-card', $data);

        return $pdf->stream();

    }

    public function index()
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
