<!DOCTYPE html>
<html>
<head>
    <title>posts</title>
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
                <th>کد پست</th>
                <th>عنوان</th>
                <th>نویسنده</th>
                <th>متن پست</th>
                <th colspan="2">عملیات لازم</th>
            </tr>
            </thead>
            @foreach($posts as $post)
                @if(count($posts)>=7)
                    <tbody>
                    <tr>
                        <th>{{$post->id}}</th>
                        <th>{{$post->title}}</th>
                        <th>{{$post->author}}</th>
                        <th>{{substr($post->content,0,50)}}</th>
                        <th>
                            <a href="{{ route('posts.edit',$post->id)}}" class="btn btn-outline-primary btn-dark">ویرایش </a>
                        </th>
                        <th>
                            <form action="/posts/{{$post->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button name="delete" class="btn btn-danger btn-outline-secondary">حذف</button>
                            </form>
                        </th>
                    </tr>
                    @else
                        <tr>
                            <th>مطلبی جهت نمایشش وجود ندارد</th>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
        </table>
            <hr>
           <div class="offset-4">
               {!! $posts->render() !!}
           </div>
        </div>
    </div>
</div>
<hr>

<p  class=" offset-5" >for add Post <a href="posts/create" class="btn btn-info btn-outline-secondary">click</a>there</p>
</body>
</html>
