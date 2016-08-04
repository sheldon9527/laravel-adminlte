<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
                <a href="../../index2.html"><b>DEFARA</b> - ADMIN</a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('admin.auth.login.post') }}" method="POST">
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Username" value="{{old('username')}}" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password"  name="password" class="form-control" placeholder="Password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
