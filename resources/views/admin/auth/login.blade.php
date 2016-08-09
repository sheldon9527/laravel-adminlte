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
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{route('front.index')}}"><b>博客</b> - 管理</a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">登录开始创造你的博客</p>
                <form action="{{ route('admin.auth.login.post') }}" method="POST">
                    @include('admin.common.errors', ['errors'=>$errors])
                    <div class="form-group has-feedback">
                        <input type="text" name="email" class="form-control" placeholder="邮箱" value="{{old('email')}}" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password"  name="password" class="form-control" placeholder="密码" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">登陆</button>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-8"><a href='{{route('admin.auth.signup.get')}}'><b>注册</b> - 拥有自己的博客</a></div>
                        <div class="col-xs-4">
                            <a href=''>忘记密码?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
