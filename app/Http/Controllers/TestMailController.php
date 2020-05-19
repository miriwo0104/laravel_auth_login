<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//下記を追記する
use Illuminate\Support\Facades\Mail;
use App\Mail\TestSendMail;
//上記までを追記する

class TestMailController extends Controller
{
    //下記を追記する
    public function input()
    {
        return view('test_mails.input');
    }

    public function send(Request $request)
    {
        $contact = $request->all();
        Mail::to($contact['email'])->send(new TestSendMail());
        return redirect('/input');
    }
    //上記までを追記する
}
            