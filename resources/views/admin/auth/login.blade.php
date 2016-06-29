@extends('admin.layouts.public')

@section('css')
    <link rel="stylesheet" href="{{Admin::asset('css/pages/login.css')}}">
    <link rel="stylesheet" href="{{ Admin::pluginAsset('iCheck/square/blue.css') }}">
@endsection

@section('content')
    <img id="background" src="">
    <div id="form-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-box">
                        <div class="login-logo">
                            <p><span style="color: #f4645f;">BOM</span><b>SHOP</b></p>
                        </div>
                        <!-- /.login-logo -->
                        <div class="login-box-body">
                            <p class="login-box-msg">帐号登录</p>
                            <form action="{{ route('admin.login') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input name="email" class="form-control" placeholder="邮箱" type="email" value="{{ old('email') }}">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    <p class="help-block">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <input name="password" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" placeholder="密码" type="password">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    <p class="help-block">{{ $errors->first('password') }}</p>
                                </div>
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="checkbox icheck">
                                            <label>
                                                <input name="remember" type="checkbox" class="icheck-square-checkbox"> 记住密码
                                            </label>
                                        </div>
                                    </div><!-- /.col -->
                                    <div class="col-xs-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                                    </div><!-- /.col -->
                                </div>
                            </form>
                        </div>
                        <!-- /.login-box-body -->
                        <div class="login-box-footer">
                            <a href="{{ route('admin.password.reset') }}">忘记密码?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ Admin::pluginAsset('rainyday/rainyday.min.js') }}"></script>
    <script src="{{ Admin::pluginAsset('iCheck/icheck.min.js') }}"></script>
    <script>
        $(function() {
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"], input[type="radio"]').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            });

            run();
        });
        function run() {
            var image = document.getElementById('background');
            var container = document.getElementById('form-container');
            image.onload = function () {
                var engine = new RainyDay({
                    image: this
                });

                // 4
//            engine.rain([ [1, 0, 1000], [3, 3, 1] ], 100);

                // 3
//            engine.rain([ [0, 2, 200], [3, 3, 1] ], 100);

                // 2
                engine.rain([ [3, 2, 2] ], 100);

                // 1
//            engine.rain([ [1, 2, 8000] ]);
//            engine.rain([ [3, 3, 0.88], [5, 5, 0.9], [6, 2, 1] ], 100);
            }

            image.src = '{{ Admin::pluginAsset('rainyday/images/1.jpg') }}';
        }
    </script>
@endsection