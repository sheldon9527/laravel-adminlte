<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="/bower/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/bower/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/bower/Ionicons/css/ionicons.min.css">
        <link rel="stylesheet" href="/css/style.min.css">
        <link href="/bower/AdminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>
        <link href="/bower/AdminLTE/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css"/>
        <script src="/bower/requirejs/require.js"></script>
        <script src="/js/admin.js"></script>
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{route('front.index')}}"><b>博客</b> - 管理</a>
            </div>

            <div class="login-box-body">
              <p class="login-box-msg">修改密码</p>
                @include('admin.common.errors', ['errors'=>$errors])
                <form action="{{ route('admin.auth.modity.password') }}" method="POST" id='table-signup'>
                    <p id="verification" class="text-red"></p>
                    <div class="form-group has-feedback">
                        <input type="text" name="email" class="form-control" placeholder="邮箱" value="{{old('email')}}" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <p id="email" class="text-blue"></p>
                    <div class="form-group has-feedback">
                        <input type="text" name="code" class="form-control" placeholder="输入验证码" value="{{old('code')}}" required>
                        <input type="button" class="pull-right" id="btn" value="免费获取验证码" />
                        </br>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password"  name="password" class="form-control" placeholder="新密码" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password"  name="password_confirmation" class="form-control" placeholder="确认新密码" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">确定修改</button>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-8"><a href='{{route('admin.auth.login.get')}}'><b>登陆</b> - 已有账号</a></div>
                        <div class="col-xs-4">
                            <a href='{{route('front.index')}}'>了解博客信息</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script type="text/javascript">
            require(['jquery'], function($) {
                $('#table-signup').on('click', '#btn', function() {
                    var email = $(":input[name='email']").val();
                    if(!email){
                        $("#verification").text("*邮箱不能为空");
                        return;
                    }

                    $.ajax({
                        url: '/manager/auth/sendCode',
                        type: 'POST',
                        data: {
                            email: email,
                        }
                    })
                    .done(function(data) {
                        if (data.success == 1) {
                          $("#email").text('验证码已经发送，请去邮箱查看');
                          $("#btn").val('请重新发送');
                        }else {
                            $("#verification").text(data.error);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
