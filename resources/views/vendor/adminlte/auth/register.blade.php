@extends('adminlte::layouts.auth')

@section('htmlheader_title')
    Register
@endsection

@section('content')

    <body class="hold-transition register-page">
    <div id="app" v-cloak>
        <div class="register-box">
            <div class="register-logo">
                <a href="{{ url('/') }}"><img src="/img/mishift_logo.png" alt="orbit"></a></a>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-box-body">
                <p class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>
                <form action="{{ url('/register') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input id="role_id" type="hidden" name="role_id" value="" >
                    <input id="package_id" type="hidden" name="package_id" value="">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="First Name" style="background-color: white" name="name" value="{{ old('name') }}" autofocus required/>
                        {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Surname" style="background-color: white" name="surname" value="{{ old('surname') }}" required/>
                        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.username') }}" style="background-color: white" name="user_name" autofocus/>

                    </div>
                    {{--@if (config('auth.providers.users.field','email') === 'username')--}}
                        {{--<div class="form-group has-feedback">--}}
                            {{--<input type="text" class="form-control" placeholder="{{ trans('adminlte_lang::message.username') }}" style="background-color: white" required name="username" autofocus/>--}}
                            {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" placeholder="{{ trans('adminlte_lang::message.email') }}" style="background-color: white" name="email" required value="{{ old('email') }}"/>
                        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
                    </div>

                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" placeholder="e.g 089 123 45678" pattern="^[0-9\-\+\s\(\)]*$"  style="background-color: white" name="contact_number" required value="{{ old('contact_number') }}"/>
                        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
                    </div>

                    <div class="form-group has-feedback">
                        <select id="gender" type="text" class="form-control"  style="background-color: white" name="gender" value="{{ old('company_name') }}" placeholder="select gender">

                            <option>male</option>
                            <option>female</option>
                        </select>
                        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="Company Name" style="background-color: white" name="company_name" value="{{ old('company_name') }}"/>
                        {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="{{ trans('adminlte_lang::message.password') }}" required style="background-color: white" name="password"/>
                        {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Confirm Password" required style="background-color: white" name="password_confirmation"/>
                        {{--<span class="glyphicon glyphicon-log-in form-control-feedback"></span>--}}
                    </div>
                    <div class="row">
                        <div class="col-xs-1">
                            <label>
                                {{--class="checkbox_register icheck"--}}
                                <div>
                                    <label>
                                        <input type="checkbox" name="terms">
                                    </label>
                                </div>
                            </label>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <div class="form-group">
                                <button type="button" class="btn btn-block btn-flat" data-toggle="modal" data-target="#termsModal">{{ trans('adminlte_lang::message.terms') }}</button>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-4 col-xs-push-1">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('adminlte_lang::message.register') }}</button>
                        </div><!-- /.col -->
                    </div>
                </form>

                {{--@include('adminlte::auth.partials.social_login')--}}

                <a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>
            </div><!-- /.form-box -->
        </div><!-- /.register-box -->
    </div>

    @include('adminlte::layouts.partials.scripts_auth')

    @include('adminlte::auth.terms')

    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
//            $('select').select2({
//               placeholder:"Select Placeholder"
//            });
        });
    </script>
    <script>
        $(function(){
            if (typeof(Storage) !== "undefined") {
                // Code for localStorage/sessionStorage.
                var package_id = sessionStorage.getItem("package_id");
                $('#package_id').val(package_id);
            } else {
                // Sorry! No Web Storage support..
                alert("You are using an outdated browser!!");
            }
        });

    </script>

    </body>
{{--<body class="hold-transition register-page">--}}
    {{--<div id="app" v-cloak>--}}
        {{--<div class="register-box">--}}
            {{--<div class="register-logo">--}}
                {{--<a href="{{ url('/') }}"><img src="/img/orbit_logo_new.png" alt="orbit"></a></a>--}}
            {{--</div>--}}

            {{--@if (count($errors) > 0)--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<strong>Whoops!</strong> {{ trans('adminlte_lang::message.someproblems') }}<br><br>--}}
                    {{--<ul>--}}
                        {{--@foreach ($errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--<div class="register-box-body">--}}
                {{--<p class="login-box-msg">{{ trans('adminlte_lang::message.registermember') }}</p>--}}

                {{--<register-form></register-form>--}}

                {{--@include('adminlte::auth.partials.social_login')--}}

                {{--<a href="{{ url('/login') }}" class="text-center">{{ trans('adminlte_lang::message.membreship') }}</a>--}}
            {{--</div><!-- /.form-box -->--}}
        {{--</div><!-- /.register-box -->--}}
    {{--</div>--}}

    {{--@include('adminlte::layouts.partials.scripts_auth')--}}

    {{--@include('adminlte::auth.terms')--}}

{{--</body>--}}

@endsection
