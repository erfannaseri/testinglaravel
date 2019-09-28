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
            @if(count($articles)>=$count)
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
                @foreach($articles as $article)

                        <tbody>
                        <tr>
                            <th>{{$article->id}}</th>
                            <th>{{$article->title}}</th>
                            <th>{{$article->source}}</th>
                            <th>{{substr($article->content,0,50)}}...</th>
                            <th><a href="articles/{{$article->id}}" class="btn btn-success btn-outline-warning">ادامه </a></th>
                            <th>
                                <a href="articles/{{$article->id}}/edit" class="btn btn-outline-primary btn-dark">ویرایش </a>
                            </th>
                            <th>
                                <form action="/articles/{{$article->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button name="delete" class="btn btn-danger btn-outline-secondary">حذف</button>
                                </form>
                            </th>
                        </tr>

                        @endforeach
                        </tbody>
            </table>
            @else

                مطلبی جهت نمایشش وجود ندارد

            @endif
            <hr>
            <div class="offset-4">
            </div>
        </div>
    </div>
</div>
<hr>
<p  class=" offset-5" >for add Post <a href="articles/create" class="btn btn-info btn-outline-secondary">click</a>there</p>
</body>
</html>
