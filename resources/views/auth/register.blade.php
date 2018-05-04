@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">管理员注册</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">姓名:</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="realname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">手机:</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">图形验证码:</label>

                            <div class="col-md-6">
                                <input id="captcha" type="text" class="form-control" name="captcha" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <img src="{{captcha_src()}}" alt="captcha" id="_captcha" onclick="this.src='{{captcha_src()}}'+Math.random();">
                            {{--{!! captcha_img() !!}--}}
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">手机验证码:</label>

                            <div class="col-md-4">
                                <input id="name" type="text" class="form-control" name="captcha_phone" value="{{ old('name') }}" required autofocus>
                                <div class="btn btn-default" id="_sms">点击</div>
                                <div class="btn btn-default" id="send_sms">我再点</div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">密码：</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">确认密码：</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    注册
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{--加载自定义JS--}}
@section('set-js')
    <script src="{{asset('/js/laravel-sms.js')}}"></script>
    <script>
        $('#_sms').sms({
            //laravel csrf token
            token       : "{{csrf_token()}}",
            //请求间隔时间
            interval    : 60,
            //请求参数
            requestData : {
                //手机号
                mobile : function () {
                    return $('#phone').val();
                },
                //手机号的检测规则
                mobile_rule : 'mobile_required'
            },
            //消息展示方式(默认为alert)
            notify      : function (msg, type) {
                alert(msg);
            },

            //语言包
            language    : {
                sending    : '短信发送中...',
                failed     : '请求失败，请重试',
                resendable : '60 秒后再次发送'
            }
        });
    </script>
    <script>
        $('#send_sms').click(function () {
            $.ajax({
                url     : '{{route('sms')}}',
                type    : 'post',
                data    : {mobile:'17692921202','_token':"{{csrf_token()}}"},
                success : function (data) {
                    console.log(data);
                },
                error   : function(error){
                    console.log(error);
                }
            });
        });
    </script>
@endsection
