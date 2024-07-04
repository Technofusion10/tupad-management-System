<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\TupadAnnouncement;
use App\Models\TupadInformation;
use App\Models\TupadEmployee;

class CheckIdentificationController extends Controller
{
    public function index(Request $request)
    {

        // $encrypted = Crypt::encryptString($beneficiary->id);
        // print_r($encrypted);

        // $decrypt_id = Crypt::decryptString($request->id);
        // print_r($decrypt);

        // dd($decrypt);

        // Fetch Project Information
        // $check_beneficiary = TupadEmployee::where("id", "=", $decrypt_id)->first();

        try {

            //
            $decrypt_id = Crypt::decryptString($request->id);
            // Fetch Project Information
            $check_beneficiary = TupadEmployee::where("id", "=", $decrypt_id)->first();
            //
            return view('check-beneficiary-identification', compact('check_beneficiary'));

        } catch (DecryptException $e) {

            //
            $check_beneficiary = NULL;
            //
            return view('check-beneficiary-identification', compact('check_beneficiary'));

        }



    }
}
