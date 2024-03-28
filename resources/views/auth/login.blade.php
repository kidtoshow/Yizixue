{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}

{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}

{{--    <title>SB Admin 2 - Login</title>--}}

{{--    <!-- Custom fonts for this template-->--}}
{{--    <link href="{{asset('sb-admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">--}}
{{--    <link--}}
{{--        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"--}}
{{--        rel="stylesheet">--}}

{{--    <!-- Custom styles for this template-->--}}
{{--    <link href="{{asset('sb-admin/css/sb-admin-2.min.css')}}" rel="stylesheet">--}}

{{--</head>--}}
@extends('layouts.guest2')



@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-bg mb-4" style="color: #4C2A70">會員登入</h1>
                                    </div>

                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input id="email" type="email" class="form-control form-control-user" name="email" value="{{ old('email') }}" placeholder="會員帳號" autofocus>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input id="password" type="password" class="form-control form-control-user" name="password" placeholder="輸入密碼" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="checkbox">
                                                    <label  style="color: #4C2A70;">
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 記住帳號
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class=" text-white btn btn-user btn-block" style="background-color: #4C2A70">
                                                登入
                                            </button>

{{--                                            <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                                忘記密碼?--}}
{{--                                            </a>--}}
                                        </div>
                                        <a href="{{url('line')}}" class="btn btn-success bg-success btn-user btn-block">
                                            Login with Line
                                        </a>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <a class="btn text-white btn-block btn-user" style="background-color: #4C2A70" href="{{route('register')}}">註冊</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('sb-admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('sb-admin/js/sb-admin-2.min.js')}}"></script>

@endsection