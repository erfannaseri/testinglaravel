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
        <div class="col-6 offset-1" style="margin-top: 300px">

            <form action="{{route('custom.upload')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <fieldset>
                    <div class="form-group d-flex flex-fill ">
                        <label for="image">آپلود سنتر</label>
                        <input type="file" name="image" multiple>
                        <div>{{$errors->first('image')}}</div>
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
                    @if(session('image'))
                        <img src="images/{{session('image')}}" alt="">
                    @endif
            </div>
        </div>
    </div>
</div>

</body>
</html>

