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
            <div class="login-box-body">
                <p class="login-box-msg center"><h1>success</h1></p>
                  <div class="row">
                      <div class="col-xs-8"><a href='{{route('admin.auth.login.get')}}'><b>登陆</b></a></div>
                      <div class="col-xs-4">
                          <a href='{{route('front.index')}}'>了解博客信息</a>
                      </div>
                  </div>
            </div>
        </div>
    </body>
</html>
