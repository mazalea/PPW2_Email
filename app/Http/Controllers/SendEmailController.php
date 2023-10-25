<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;
use App\Jobs\SendMailJob;

class SendEmailController extends Controller
{
    public function index(){
        // $content = [
        //     'subject'=> 'This is the mail subject',
        //     'body'=> 'This is the email body of how to send email from Laravel 10 with mailtrap.'
        // ];

        // Mail::to('mariaazaleanareswari@mail.ugm.ac.id')->send(new SendEmail($content));
        // return "Email berhasil dikirim.";

        return view('kirim-email');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        dispatch(new SendMailJob($data));
        return redirect()->route('kirim-email')->with('success', 'Email berhasil dikirim');
    }
}
