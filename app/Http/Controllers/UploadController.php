<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function index() {
        return view('upload.index');
    }

    public function save(Request $request) {

        //バリデーション適応
/*         $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]); */

        $path = $request->file('avatar')->store('avatars');

        return redirect('/');
    }
}
