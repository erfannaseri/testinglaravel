@extends('layout.plugin')

@section('table')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-2 " style="margin-top:80px ">
                @if(count($categories) >=$count)
                    <table align="center" class="table">
                        <thead>
                        <tr>
                            <th>کد دسته بندی</th>
                            <th>عنوان</th>
                            <th colspan="2">عملیات لازم</th>
                        </tr>
                        </thead>
                        @foreach($categories as $category)

                            <tbody>
                            <tr>
                                <th>{{$category->id}}</th>
                                <th>{{$category->title}}</th>
                                <th>
                                    <a href="categories/{{$category->id}}/edit" class="btn btn-outline-primary btn-dark">ویرایش </a>
                                </th>
                                <th>
                                    <form action="/categories/{{$category->id}}" method="post">
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

                    <h3 align="center"> مطلبی جهت نمایش وجود ندارد</h3>

                @endif

            </div>
        </div>
    </div>

@endsection
@section('add_category')
    <p  class=" offset-5" ><a href="categories/create" class="btn btn-info btn-outline-secondary">دسته بندی جدید +</a></p>
@endsection
