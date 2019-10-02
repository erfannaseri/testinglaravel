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
        <form action="/articles" method="post">
            {{csrf_field()}}
            <p>عنوان مورد نظر را  وارد کنید</p>
            <input type="text" name="title" placeholder="عنوان مقاله ارسالی ">
            <p>منبع</p>
            <input type="text" name="source" placeholder="example.com">
            <p>دسته بندی ها را انتخاب نمایید</p>
            <select name="categories[]" id="" multiple>
                @foreach($categories as $category )
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
            <p>متن</p>
            <textarea name="content" id="" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" name="submit" value="تایید">
        </form>
    </div>
</div>
</body>
</html>


