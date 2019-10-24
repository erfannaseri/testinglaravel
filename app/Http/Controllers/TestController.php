<?php

namespace App\Http\Controllers;

use App\Events\SignUpUser;
use App\Http\Requests\CustomRegisterFormRequest;
use App\Http\Requests\ImageFormRequest;
use App\Image;
use App\Jobs\SendEmail;
use App\Jobs\SendEmailJob;
use App\Jobs\SendWelcomeEmail;
use App\User;

use Event;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Carbon;
use Log;
use Mail;
use Storage;
use Str;

class TestController extends Controller
{
    public function index()
    {
        return view('custom.upload');
    }

    public function storeImage(ImageFormRequest $request)
    {
        if ($request->hasFile('image')) {

            //$photo = Photo::create(['image' => $request->input('image')]);
            $image = $request->file('image');

            $extension = $image->getClientOriginalExtension();
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

            $file_name = $name . '_' . uniqid() . '.' . $extension;

            Storage::put('public/images/' . $file_name, fopen($request->file('image'), 'r+'));
            Storage::put('public/images/thumbnail/' . $file_name, fopen($request->file('image'), 'r+'));

            $thumbnail = public_path('storage/images/thumbnail/' . $file_name);

            $img = Image::make([$thumbnail])->resize(400, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnail);


        }
        return back()->with('status', "Image uploaded successfully.");
    }

//            $images = $request->file('image');
//            $file_name = 'image-' .$images->getClientOriginalExtension();
//            $thumbnailPath = public_path().'\thumbnail\\';
//            $resize_image=Image::make($images);
//            $resize_image->resize(150,150)->save($thumbnailPath.time().$images->getClientOriginalName());
//            $images->move('images', $file_name);
//            //$photo->update(['photo' => $file_name]);
//            return back()->with('image', $file_name);
//        }else{
//            return back()->with('status','plz upload image');
//        }


    public function showFormRegister()
    {
        $token=Str::random(40);
        return view('custom.register',compact('token'));
    }

    public function register(CustomRegisterFormRequest $request)
    {
        $user=User::create([
            'name'      =>$request->input('name'),
            'surname'   =>$request->input('surname'),
            'email'     =>$request->input('email'),
            'password'  =>Hash::make($request->input('password')),
            'image'     =>$request->input('image'),
            'verifyToken'=>$request->input('verifyToken'),
        ]);


            $image=$request->file('image');
            $file_name='user-'.$user->id.'.'.$image->getClientOriginalExtension();

            $image->move('TestFolder',$file_name);

            User::where('id',$user->id)->update(['image'=>$file_name]);



        Event(new SignUpUser($user));

    }
    public function pageSendEmail()
    {
        return view('custom.email');
    }
    public function sendMail()
    {
        Log::info('time that  used for sending Email Without Queue is start');
        Mail::send('email.welcome',['data'=>'data'],function ($message){
            $message->from('er9.naseri@gmail.com','Erfan Naseri');
            $message->to(['oxtdz@hi2.in','er9.naseri@gmail.com']);
            $message->subjet('test time ');
        });
        Log::info('time that  used for sending Email Without Queue is start');

    }
    public function queue()
    {
        return view('custom.email2');

    }

    public function sendMail3()
    {
        Log::info('start');
       $job=(new SendEmailJob())->delay(Carbon::now()->addSeconds(10));
       $this->dispatch($job);
        Log::info('stop');
    }

}
