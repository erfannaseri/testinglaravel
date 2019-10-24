<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomRegisterFormRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Mail\verifyUser;
class CustomController extends Controller
{





    public function showRegisterForm()
    {
        $token=Str::random(40);
        return view('custom.register',compact('token'));
    }
    public function register(CustomRegisterFormRequest $request)
    {
        $validation=$request->validated();
        $data=[
            'name'          =>$request->input('name'),
            'surname'       =>$request->input('surname'),
            'email'         =>$request->input('email'),
            'password'      =>Hash::make($request->input('password')),
            'image'         =>$request->input('image'),
            'verifyToken'   =>$request->input('verifyToken')
        ];





       $user=User::create($data);
        $image=$request->file('image');
        $new_name='User-'.$user->id.'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images_users'),$new_name);
        User::where('id',$user->id)->update(['image'=>$new_name]);
        return back()->with('success','اپلود موفقیت امیز بود');
//        $thisUser=User::findOrFail($user->id);
//        $this->Sendmail($thisUser);
//       return view('email.VerifyEmailFirst');
    }


    public function sendmail($thisUser){
        Mail::to($thisUser)->send(new verifyUser($thisUser));
    }



    public function showLoginForm()
    {
        return view('custom.login');
    }



    public function SendEmailDone($email,$verifyToken)
    {

        $user=User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if ($user) {

            $activate=User::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>'']);
            if ($activate){
                return '<h3 align="center" style="margin-top: 270px">🙂حساب شما فعال گردید </h3>';
            }

        }else{
            return '<h3 align="center" style="margin-top: 270px">چنین کاربری ثبت نام نکرده است🥴</h3>' ;
        }


    }



    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ],
            [   'email.required' => 'لطفا فیلد ایمیل را تکمیل نمایید.',
                'email.email'   =>'فرمت وارد شده برای ایمیل  درست نیست ',
                'password.required'      =>'لطفا فیلد مربوط به رمز عبور را پر کنید',
                'password.min'           =>'رمز عبور وارد شده کوتاه است'
            ]);

        if (Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password'),'status'=>'1'])) {
            return redirect(route('home'))->with('status','به پنل کاربری خود خوش امدید');
        }else{
            return redirect(route('custom.login'))->with('status','چنین کاربری وجود ندارد');
        }

    }



}
