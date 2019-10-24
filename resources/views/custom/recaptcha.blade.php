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
                <input type="hidden" name="recaptcha" id="recaptcha">
rgr
            </form>
        </div>
        <div class="col-4 offset-1">
            <div style="margin-top: 80px">
                @if(count($errors)>0)
                    @foreach($errors->all() as $error)
                        <h4 class="alert alert-info" >{{$error}}</h4>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
<script src="https://www.google.com/recaptcha/api.js?render=_6LeRLL8UAAAAACvZI-O7rrjrLXBMwACjsPoDh9gG"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LeRLL8UAAAAACvZI-O7rrjrLXBMwACjsPoDh9gG', {action: 'homepage'}).then(function(token) {
            if(token){
                document.getElementById('recaptcha').value=token;
            }
        });
    });
</script>
</body>
</html>
