<!DOCTYPE html>
<html>
<head>
    <title>بررسی ورود</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
<h2 align="center">به صفحه اضافه کردن پست جدید خوش امدید</h2>
<br><br><br><br><br>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
@if(Session::has('insertArticle'))
    {{session('insertArticle')}}
@endif
<div style="margin-left: 550px;background: darkgray;width:400px">
    <div align="center">
        @foreach($articles as $article)
        <form action="/articles/{{$article->id}}" method="post">
            {{csrf_field()}}
            @method('PUT')
            <p>عنوان مورد نظر را  وارد کنید</p>
            <input type="text" name="title" value="{{$article->title}}">
            <p>منبع</p>
            <input type="text" name="source" value="{{$article->source}}">
            <p>متن</p>
            <textarea name="content" id="" cols="30" rows="10">{{$article->content}}</textarea>
            <br>
            <input type="submit" name="submit" value="تایید">
        </form>
            @endforeach
    </div>
</div>
</body>
</html>


