<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
class C_Mail extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from jagoit',
            'body' => 'This is body email'
        ];

        Mail::to('hafizh.project45@gmail.com')->send(new TestMail($mailData));
        dd('Email send successfully');
    }
}
