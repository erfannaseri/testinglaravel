<!DOCTYPE html>
<html>
<head>
    <title>بررسی ورود</title>
</head>
<body>
@if(Session::has('guest'))
    {{session('guest')}}
    @endif
@if(Session::has('other_job'))
    {{session('other_job')}}
@endif
<form action="/verify" method="post">
    {{csrf_field()}}
    <input type="text" name="username" placeholder="عنوان مبارکت">
    <input type="email" name="email" placeholder="example@email.com">
    <input type="submit" name="ok" value="ok">
</form>
</body>
</html>
