<!DOCTYPE html>
<html>
<head>
    <title>مقاله ها</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif
<div class="container">
    <div class="row">
        <div class="col-lg-8 offset-2 " style="margin-top:80px ">
            <table align="center" class="table">
                <thead>
                <tr>
                    <th>کد مقاله</th>
                    <th>عنوان</th>
                    <th>منبع</th>
                    <th>متن</th>
                    <th colspan="3">عملیات لازم</th>
                </tr>
                </thead>

                        <tbody>
                        <tr>
                            <th>{{$articles->id}}</th>
                            <th>{{$articles->title}}</th>
                            <th>{{$articles->source}}</th>
                            <th>{{$articles->content}}</th>
                            <th>
                                <a href="../articles/{{$articles->id}}/edit" class="btn btn-outline-primary btn-dark">ویرایش </a>
                            </th>
                            <th>
                                <form action="/articles/{{$articles->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button name="delete" class="btn btn-danger btn-outline-secondary">حذف</button>
                                </form>
                            </th>
                        </tr>


                        </tbody>
            </table>
            <hr>
            <div class="offset-4">
            </div>
        </div>
    </div>
</div>
<hr>
<h3 align="center">نظرات ثبت شده</h3>
<div class="container bg-primary">
    <div class="row">
        <div class="col-12">
            @foreach($articles->comments as $comment)
                <p class="bg-danger text-black-50" align="right"> {{$comment->author}} : میگه</p>
               <h4 align="right" style="margin-right:100px"> {{$comment->content}}</h4>
                <hr>
            @endforeach
        </div>
    </div>
</div>
<hr>
<div class="container ">
    <div class="row ">
        <div class="col-lg-8 offset-2">
        <form action="{{$articles->id}}/comments" method="post"  dir="rtl">
            {{csrf_field()}}
            <div class = "form-group" dir="rtl">
                <label for = "name" dir="rtl">نام شما</label>
                <input type = "text" class = "form-control" name="author" placeholder = "frank lampard">
            </div>

            <div class="form-group">
                <label dir="rtl" for="exampleFormControlTextarea3">نظر</label>
                <textarea class="form-control" id="exampleFormControlTextarea3" name="content" rows="7"></textarea>
            </div>
            <div class="form-group">
                <input class="btn  btn-info" type="submit" name="submit" value="تایید">
            </div>
        </form>
        </div>
    </div>
</div>
</body>
</html>
