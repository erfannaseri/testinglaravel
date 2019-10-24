<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min-1.css')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فرم ثبت نام ادمین</title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6 offset-1">

            <form action="{{route('custom.loginUser')}}" method="post">
                {{csrf_field()}}
                <fieldset>
                    <legend style="margin-top: 90px "><h4 align="center" >فرم ورود کاربران</h4></legend>
                    <div class="form-group">
                        <label for="exampleInputEmail1">آدرس آیمیل</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" value="{{old('email')}}"  name="email" placeholder="example@id.com">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">رمز عبور</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="1234!@#$?">
                    </div>


                    <button type="submit" class="btn btn-primary btn-block">ورود </button>
                </fieldset>
            </form>
        </div>
        <div class="col-4 offset-1">
            <div style="margin-top: 170px">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <h4 class="alert alert-info" >{{$error}}</h4>
                    @endforeach
                @endif
                @if(session('status'))
                   <h4 align="center" class="alert  alert-dark"> {{session('status')}}</h4>
                @endif
            </div>
        </div>
    </div>
</div>

</body>
</html>
