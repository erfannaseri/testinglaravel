<!DOCTYPE html>
<html>
<head>
    <title>دسته بندی ها</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
@yield('table');
<br>
<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-4 offset-5">

        </div>
    </div>
</div>
@yield('add_category')
</body>
</html>
