<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use App\Models\Kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class KpiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Kpi  $kpi
     * @return \Illuminate\Http\Response
     */
    public function show(Kpi $kpi)
    {
        $appraisals = Appraisal::where('recipient', Auth::user()->email)->get();
        $appraisalsCount = $appraisals->count();
       return view('employee.edit_kpi',['kpi' => $kpi,'appraisals' => $appraisals, 'appraisalsCount' => $appraisalsCount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kpi  $kpi
     * @return \Illuminate\Http\Response
     */
    public function edit(Kpi $kpi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kpi  $kpi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kpi $kpi)
    {

       // dd($request->all());
        $request->validate([
            'current' => ['required'],
        ]);
        //calculate the score
        $score = round(($request->current/$request->target) *100);
        $score = abs($score);
        $grade = "";
        if($score <= 15){
            $grade = "Unsatisfactory";
        }else if ($score <= 30){
            $grade = "Needs Improvement";
        }else if($score <= 50){
            $grade = "Proficient";
        }else if($score <= 85){
            $grade = "Commendable";
        }else{
            $grade = "Excellent";
        }
        //update the kpi status
        $kpi = DB::table('kpis')
            ->where('id', $request->id)
            ->update(
                [
                    'current' => $request->current,
                    'score' => $score,
                    'grade' => $grade

                ]);


        //send a mail to admin
        Session::put('toEmail', \Config::get('admin.email'));
        //details to send via mail
        $data = [
            'heading' => 'KPI Status To Manager',
            'msgBody' => 'Objective: '.   $request->objective . ' ||'.
                'Target : '.  $request->target.'     and ||        '.
                'Current status : '.  $request->current.'     and ||        '.
                'Score : '.  $score.'%     and ||        '.
                'Existing grade: '.  $request->grade
        ];

        //send mail to admin
        Mail::send('emails.kpi', $data, function($mail){
            $mail->from('vakporize@gmail.com');
            $mail->to(Session::get('toEmail'));
            $mail->subject('KPI Status');
        });
        //redirect
        return redirect()->route('employee.index')->with('success','The KPI Status Has Been Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kpi  $kpi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kpi $kpi)
    {
        //
    }
}
