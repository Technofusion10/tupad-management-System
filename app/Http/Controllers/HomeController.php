<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $countingTupadTotals = DB::table('tupad_information')
        //->selectRaw('count(*) as totalTupadBudget')
        //->selectRaw("count(case when status = 'DENIED' then 1 end) as deniedTupadProject")
        ->selectRaw('sum(total_budget) as totalTupadBudget')
        ->selectRaw("count(case when status = 'DENIED' then 1 end) as deniedTupadProject")
        ->selectRaw("count(case when status = 'PENDING' then 1 end) as pendingTupadProject")
        ->selectRaw("count(case when status = 'APPROVED' then 1 end) as approvedTupadProject")
        ->first();

        $totalBudget = DB::table('tupad_information')
        //->where('status', '!=', 'DENIED')
        ->sum('total_budget');

        $totalPendingBudget = DB::table('tupad_information')
        ->where('status', 'PENDING')
        ->sum('total_budget');

        $totalApprovedBudget = DB::table('tupad_information')
        ->where('status', 'APPROVED')
        ->sum('total_budget');

        $totalDeniedBudget = DB::table('tupad_information')
        ->where('status', 'DENIED')
        ->sum('total_budget');

        $percentage = ($totalApprovedBudget / $totalBudget) * 100;


        return view('home', compact(
            'countingTupadTotals',
            'totalPendingBudget',
            'totalApprovedBudget',
            'totalDeniedBudget',
            'percentage'
        ));

    }

    /**
     * User Profile
     * @param Nill
     * @return View Profile
     * @author Shani Singh
     */
    public function getProfile()
    {
        return view('profile');
    }

    /**
     * Update Profile
     * @param $profileData
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function updateProfile(Request $request)
    {
        #Validations
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_number' => 'required|numeric|digits:10',
        ]);

        try {
            DB::beginTransaction();

            #Update Profile Data
            User::whereId(auth()->user()->id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile_number' => $request->mobile_number,
            ]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Profile Updated Successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Change Password
     * @param Old Password, New Password, Confirm New Password
     * @return Boolean With Success Message
     * @author Shani Singh
     */
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try {
            DB::beginTransaction();

            #Update Password
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

            #Commit Transaction
            DB::commit();

            #Return To Profile page with success
            return back()->with('success', 'Password Changed Successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }
}
