
<!DOCTYPE html>
<html>
<head>
    <title>صفحه ویرایش</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
<h2 align="center">به صفحه ویرایش کردن پست مربوطه خوش امدید</h2>
<br><br><br><br><br>
<div style="margin-left: 550px;background: darkgray;width:400px">
    <div align="center">
        @foreach($posts as $post)
        <form action="/posts/{{$post->id}}" method="post">
            @method('PATCH');
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">عنوان </label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}"/>
            </div>
            <div class="form-group">
                <label for="author">نویسنده : </label>
                <input type="text" class="form-control" name="author" value="{{$post->author}}"/>
            </div>
            <div class="form-group shadow-textarea">
                <label for="exampleFormControlTextarea6">متن پست مورد نظر</label>
                <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" name="content" rows="3" >{{$post->content}}</textarea>
            </div>
            <br>
            <input type="submit" name="submit" class="btn btn-success btn-outline-dark" value="تایید">
        </form>
            @endforeach
    </div>
</div>
</body>
</html>

