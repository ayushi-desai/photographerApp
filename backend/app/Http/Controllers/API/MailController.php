<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignUp;

class MailController extends Controller
{
    //
    public function senMail(){
        // return view('SignUpMailView');
        Mail::to('niravkumar621@gmail.com')->send(new SignUp('ABC'));
        return response()->json("Email sent");
    }
}
