<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validated_data=[
            'name'      =>'required|max:255',
            'surname'  =>'required|max:255',
            'email'     =>'required|email|unique:USERS|max:255',
            'password'  =>'required|confirmed|min:6|max:24',
            'image'     =>'nullable|image|max:500000'
        ];

        return  $validated_data;
    }
    public function messages()
    {
        return [ 'name.required'     =>'لطفا فیلد نام را وارد نمایید',
            'name.max'          =>'نام وارد شده بسیار طولانی است',
            'surname.required'  =>'لطفا فیلد نام خانوادگی را وارد نمایید',
            'surname.max'       =>'نام خانوادگی وارد شده بسیار طولانی است',
            'email.required'    =>'لطفا فیلد ایمیل را تکمیل نمایید',
            'email.email'       =>'فرمت ایمیل وارد شده صحیح نیست',
            'email.unique'=>'چنین ایمیلی قبلا ثبت نام کرده است',
            'email.max'         =>'ایمیل وارد شده بسیار طولانی میباشد',
            'password.required' =>'لطفا فیلد رمز عبور را کامل کنید',
            'password.confirmed'=>'پسورد ها با هم مطابقت ندارد',
            'password.min'      =>'رمز عبور وارد شده بسیار کوتاه میباشد',
            'password.max'      =>'رمز عبور بسیار طولانی است',
            'image.image'       =>'فرمت وارد شده مورد تایید نیست',
            'image.mimes'       =>'فرمت تصویر وارد شده مورد تایید نیست',
            'image.max'         =>'حجم توصیر اپلود شده بسیار بزرگ است'
            ];
    }
}
