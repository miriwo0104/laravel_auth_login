<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
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
        ]);

        
        if ($request->file('file')->isValid([])) {
            $path = $request->file->store('public');

            $file_name = basename($path);
            $user_id = Auth::id();
            $new_image_data = new Image();
            $new_image_data->user_id = $user_id;
            $new_image_data->file_name = $file_name;

            $new_image_data->save();

//            return view('test')->with('filename', $file_name);
            return redirect('/');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }

    public function out() {
        $user_id = Auth::id();
        $user_images = Image::whereUser_id($user_id)->get();
        return view('out', ['user_images' => $user_images]);
    }

}
