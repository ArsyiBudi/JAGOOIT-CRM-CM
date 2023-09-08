<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
class C_Mail extends Controller
{
    public function index($email)
    {
        $mailData = [
            'title' => 'Mail from JAGO IT',
            'body' => 'SELAMAT TUGAS KAMU SUDAH SELESAI 🥶🥶🥶🥶🔥🔥🔥'
        ];

        Mail::to($email)->send(new TestMail($mailData));
        dd('Email send successfully');
    }
}
