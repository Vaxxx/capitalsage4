<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Appraisal;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::where('role', 'employee')
            ->where('name', Auth::user()->name)
            ->get();
        $noOfUsers = $users->count();
        $appraisals = Appraisal::all();
        return view('admin.index',['users' => $users, 'noOfUsers' => $noOfUsers,  'appraisals' => $appraisals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Generate random strings
     * to be used as password
     */
    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'email' => 'required|string|email|max:255|unique:users'
        ]);
        //create a random password for the user
        $randomString = $this->generateRandomString(20);



        //create a user
        $user = new User();
        $user->name = Auth::user()->name;
        $user->email = $request->email;
        $user->password =  Hash::make($randomString);
        $user->phone = '080 1234 5678';
        $user->role = 'employee';
       // dd("name: " . $user->name . " email: ". $user->email. " password: " . $user->password . " phone: ". $user->phone . " role: ". $user->role);
        $user->save();

        //add email to session...so that it can be used as the to email
        Session::put('toEmail', $request->email);
        //details to send via mail
        $data = [
            'heading' => $user->name,
            'msgBody' => 'Company Name: '.   $user->name . ' ||'.
                'EMAIL ADDRESS : '.  $request->email .'     and ||        '.
                'PASSWORD: '.  $randomString
        ];

        //send mail to user
        Mail::send('emails.create_employee', $data, function($mail){
            $mail->from('vakporize@gmail.com');
            $mail->to(Session::get('toEmail'));
            $mail->subject('Your login details');
        });
        //redirect to admin dashboard
        return redirect()->route('admin.index')->with('success', "A New Employee Has Been Added Successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy($id)
    {
       // $user->delete();
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.index',['success' => 'The Employee has been Deleted Successfully!']);
    }
    /**
     * Show the form for creating a new appraisal.
     *
     * @return Response
     */
    public function appraisal(){
        $users = User::where('role', 'employee')
            ->where('name', Auth::user()->name)
            ->get();
        $noOfUsers = $users->count();

        return view('admin.appraisal',['users' => $users, 'noOfUsers' => $noOfUsers]);
    }
    /**
     * Store a newly created appraisal in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function appraisalStore(Request $request){

        $request->validate([
            'recipient' => 'required|string',
            'donor' => 'required|string',
            'date_requested' => 'required',
            'deadline_date' => 'required',
            'subject' => 'required|min:5',
        ]);

        //save the appraisal
        $appraisal = new Appraisal();
        $appraisal->recipient = $request->recipient;
        $appraisal->donor = $request->donor;
        $appraisal->date_requested = $request->date_requested;
        $appraisal->deadline_date = $request->deadline_date;
        $appraisal->subject = $request->subject;
        $appraisal->save();
        //send a mail to recipient
        //add email to session...so that it can be used as the to email
        Session::put('toEmail', $request->recipient);
        //details to send via mail
        $data = [
            'heading' => 'Appraisal From Manager',
            'msgBody' => 'Date of the Appraisal: '.   $appraisal->date_requested . ' ||'.
                'Deadline : '.  $appraisal->deadline_date.'     and ||        '.
                'Appraisal: '.  $appraisal->subject
        ];

        //send mail to user
        Mail::send('emails.admin_appraisal', $data, function($mail){
            $mail->from('vakporize@gmail.com');
            $mail->to(Session::get('toEmail'));
            $mail->subject('Appraisal');
        });
        //redirect to admin dashboard
        return redirect()->route('admin.index')->with('success', "A New Appraisal has been generated!");
    }
}
