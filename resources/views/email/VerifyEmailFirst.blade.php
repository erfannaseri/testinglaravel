@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3 align="center"> مرکز پیام</h3></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <h3 align="center"><span><h1>😎</h1></span>لطفا ایمیل خود را بررسی کرده و جهت فعالسازی حساب خود اقدام نمایید</h3>
                            <a href="{{route('admin.login')}}"  class="btn btn-lg  btn-secondary">برگشت</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
