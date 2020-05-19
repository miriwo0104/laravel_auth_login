<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestSendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //下記を追記
        return $this
            ->subject('Test Mail') //メールの件名
            ->view('mails.test');//メールとして表示したいビューファイル
//            ->with(['contact' => $this->contact]); //先に指定したメールとして表示したいビューファイルに渡すパラメータをwith関数を用いて渡す
    }
}
