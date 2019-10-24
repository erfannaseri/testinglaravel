<?php

namespace App\Http\Controllers;

use App\Http\Requests\CaptchaValidate;
use Illuminate\Http\Request;
use Str;

class TestingCaptcha extends Controller
{

    public function create()
    {
        $token=Str::random(40);
        return view('custom.captchas',compact('token'));
    }

    public function registerData(CaptchaValidate $request)
    {
        $validation=$request->validated();
        if ($validation->input('captcha')) {
            return 'yeah';
        }else{
            return 'nooooo';
        }
    }
    public function refreshCaptcha()
    {
        return response()->json(['captcha'=>captcha_img()]);
    }
    public function showCaptcha(){
        return view('custom.recaptcha');
    }

}
