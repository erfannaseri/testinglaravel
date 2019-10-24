<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min-1.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فرم ثبت نام ادمین</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6 offset-1">

            <form action="{{route('submit.captcha')}}" method="post"  enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                    <legend style="margin-top: 10px "><h4 align="center" >فرم ثبت نام</h4></legend>
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{old('name')}}" name="name"  placeholder="نام ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">نام خانوادگی</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="{{old('surname')}}" name="surname"  placeholder="نام خانوادگی ...">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">آدرس آیمیل</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{old('email')}}"  name="email" placeholder="example@id.com">
                    </div>
                    <input type="hidden" name="verifyToken" value="{{$token}}">
                    <div class="form-group">
                        <label for="exampleInputPassword1">رمز عبور</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="1234!@#$?">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">تکرار رمز عبور </label>
                        <input type="password" class="form-control" id="exampleInputPassword1"  name="password_confirmation" placeholder="1234!@#$?">
                    </div>
                    <div class="form-group d-flex flex-fill ">
                        <label for="image">پروفایل شما</label>
                        <input type="file" name="image" >
                        <div>{{$errors->first('image')}}</div>
                    </div>
                    <div class="form-group ">
                        <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh" id="refresh"></i></button>
                        </div>
                        <label for="captcha">کد امنیتی</label>
                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                    </div>

                    <button type="submit" class="btn btn-primary">ثبت نام</button>
                    <a href="{{route('custom.login')}}" class="btn btn-secondary ">قبلا عضو شده ای؟</a>
                </fieldset>
            </form>
        </div>
        <div class="col-4 offset-1">
            <div style="margin-top: 80px">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <h4 class="alert alert-info" >{{$error}}</h4>
                    @endforeach
                @endif
                @if(session('success'))
                    <h4 class="alert alert-info" >{{session('success')}}</h4>
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.btn-refresh').click(function(){
        $.ajax({
            type:'GET',
            url:'/refreshcaptcha',
            success:function(data){
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
</body>
</html>
