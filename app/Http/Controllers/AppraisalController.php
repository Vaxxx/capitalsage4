<?php

namespace App\Http\Controllers;

use App\Models\Appraisal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AppraisalController extends Controller
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
     * @param  \App\Models\Appraisal  $appraisal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appraisals = Appraisal::where('recipient', Auth::user()->email)->get();
        $appraisalsCount = $appraisals->count();
        $appraisal = Appraisal::find($id);
        return view('employee.reply_appraisal', ['appraisal' => $appraisal,'appraisals' => $appraisals, 'appraisalsCount' => $appraisalsCount]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appraisal  $appraisal
     * @return \Illuminate\Http\Response
     */
    public function edit(Appraisal $appraisal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appraisal  $appraisal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appraisal $appraisal)
    {
        //dd( $request->all());
   //dd(\Config::get('admin.email'));
        $request->validate([
            'subject' => ['required', 'string', 'min: 3'],
            'reply' => ['required', 'string', 'min:3'],
        ]);
        $responseTime = date('Y/m/d - H:i:sa');//the current time
        //update the appraisal table
        $appraisal = DB::table('appraisals')
            ->where('id', $request->id)
            ->update(
                [
                    'reply' => $request->reply,
                    'response_time' => $responseTime,
                ]);

        //send a mail to the admin
        Session::put('toEmail', \Config::get('admin.email'));
        //details to send via mail
        $data = [
            'heading' => 'Appraisal To Manager',
            'msgBody' => 'Response Time of the Appraisal: '.   $responseTime . ' ||'.
                'Response : '.  $request->reply.'     and ||        '.
                'Appraisal: '.  $request->subject
        ];

        //send mail to admin
        Mail::send('emails.employee_appraisal', $data, function($mail){
            $mail->from('vakporize@gmail.com');
            $mail->to(Session::get('toEmail'));
            $mail->subject('Appraisal Response');
        });

        return redirect()->route('employee.index', $request->id)->with('success','Your response has been noted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appraisal  $appraisal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appraisal = Appraisal::find($id);
        $appraisal->delete();
        return redirect()->route('admin.index',['success' => 'The Appraisal has been Deleted Successfully!']);
    }
}
