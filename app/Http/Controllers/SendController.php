<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class SendController extends Controller
{
    //

    public function trigger() 
    {
        return view('sends.trigger');
    }

    public function store(Request $request){
        // フォームからのリクエストデータ全てを$contactに代入
        $contact = $request->all();
        Mail::to($contact['email'])->send(new ContactMail($contact)); // 引数にリクエストデータを渡す
        return redirect('/trigger');
      }
}
