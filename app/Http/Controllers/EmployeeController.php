<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\Employee;
use App\Models\Goal;
use App\Models\Kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('mustBeEmployee');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $appraisals = Appraisal::where('recipient', Auth::user()->email)->get();
        $kpis = Kpi::where('recipient', Auth::user()->email)->get();
        $goals = Goal::where('user_id', Auth::user()->id)->get();
        $appraisalsCount = $appraisals->count();
       return view('employee.index',['appraisals' => $appraisals, 'goals' => $goals, 'kpis' => $kpis, 'appraisalsCount' => $appraisalsCount]);
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
       return view('employee.edit_goals');
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

        $appraisals = Appraisal::where('recipient', Auth::user()->email)->get();
        $appraisalsCount = $appraisals->count();
        return view('employee.change_password',['appraisals' => $appraisals,'appraisalsCount' => $appraisalsCount]);
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

    public function goals(){

        $appraisals = Appraisal::where('recipient', Auth::user()->email)->get();
        $appraisalsCount = $appraisals->count();
        return view('employee.goals',['appraisals' => $appraisals,'appraisalsCount' => $appraisalsCount]);
    }

    public function goalsStore(Request $request){
       // dd($request->all());
        //validate
        $request->validate([
          'description' => 'required|min:3',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required',
            'percentage_complete' => 'required',
        ]);

        //save goal to db
        $goal = new Goal();
        $goal->user_id = $request->user_id;
        $goal->description = $request->description;
        $goal->start_date = $request->start_date;
        $goal->end_date = $request->end_date;
        $goal->status = $request->status;
        $goal->percentage_complete = $request->percentage_complete;
        $goal->save();

        //send goal status to admin
        Session::put('toEmail', \Config::get('admin.email'));
        //details to send via mail
        $data = [
            'heading' => 'Goals from Staff To Manager',
            'msgBody' => 'goal of the Employee: '.   $goal->description . ' ||'.
                'Start time of the Goal : '.  $request->start_date.'     and ||        '.
                'End time of the Goal : '.  $request->end_date.'     and ||        '.
                'Status of the Goal : '.  $request->status.'     and ||        '.
                'Percentage Completed: '.  $request->percentage_complete. '%'
        ];

        //send mail to admin
        Mail::send('emails.employee_goals', $data, function($mail){
            $mail->from('vakporize@gmail.com');
            $mail->to(Session::get('toEmail'));
            $mail->subject('Goals of Employee');
        });

        //redirect back to employee home page
        return redirect()->route('employee.index')->with("success","Your Goal Has Been Successfully Submitted!");

    }

}
