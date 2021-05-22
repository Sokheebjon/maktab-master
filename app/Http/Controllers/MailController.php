<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details = [
            'title' => 'Laravel',
            'body' => 'Sanjarbek bu test uchun edi'
        ];

        Mail::to('sobirjonovsdev@gmail.com')->send(new TestMail($details));

        return "Email sucessfully send";
    }
}
