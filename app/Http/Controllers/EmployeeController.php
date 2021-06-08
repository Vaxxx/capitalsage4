<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $appraisals = Appraisal::where('recipient', Auth::user()->email)->get();
       return view('employee.index',['appraisals' => $appraisals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }

    /**
     * Show the form for creating a new password.
     *
     * @return \Illuminate\Http\Response
     */
    public function password(){
        return view('employee.change_password');
    }
    /**
     * Store a newly created password in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function passwordStore(Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:8',
            'newPasswordConfirmation' => 'required|string|min:8'
        ]);


        if (!(Hash::check($request->get('oldPassword'), Auth::user()->password))) {

            // The passwords matches
            return redirect()->back()->with("error","Your current password does not match with the password you provided. Please try again.");
        }

        if(strcmp($request->get('oldPassword'), $request->get('newPassword')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Your New Password cannot be the same as Your Current Password. Please choose a different password.");
        }

        //Change Password
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['password' =>Hash::make($request->get('newPassword'))]);

        return redirect()->route('employee.index')->with("success","Password changed successfully !");
    }

}
