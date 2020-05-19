<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//usersテーブル用のモデルファイルを紐づける
use App\User;
//メール送信用ファサードを紐づける
use Illuminate\Support\Facades\Mail;

class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send_mail_users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'usersテーブルのemail全てにメールを送信する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users_infos = User::all();

        foreach ($users_infos as $users_info) {
            echo $users_info['email']."\n";

            Mail::raw("これはテストメールです", function($message) use ($users_info)
            {
                $message->to($users_info->email)->subject('test');
            });
        }
    }
}
