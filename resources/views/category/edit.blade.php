@extends('layout.plugin')
<br><br>
<hr>
@section('table')
    <div style="margin-left: 550px;background: darkgray;width:400px">
        <div align="center">

            <form action="/categories/{{$categories->id}}" method="post">
                {{csrf_field()}}
                @method('PUT')
                <p>عنوان مورد نظر را  وارد کنید</p>
                <input type="text" name="title" value="{{$categories->title}}">
                <p>گروه مقاله ها</p>
                <select name="articles[]"  multiple>
                    @foreach($articles as $article)
                        <option value="{{$article->id}}">{{$article->title}}</option>
                    @endforeach
                </select>
                <br>
                <input type="submit" name="submit" value="تایید">

            </form>
        </div>
    </div>
    <hr>
@endsection
