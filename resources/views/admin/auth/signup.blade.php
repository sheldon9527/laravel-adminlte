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
                <p class="login-box-msg">创建你的博客发布你的文章</p>
                <p class="login-box-msg"><span class="text-red">*全部为必填想项</span></p>
                @include('admin.common.errors', ['errors'=>$errors])
                <form action="{{ route('admin.auth.signup.post') }}" method="POST" id='table-signup'>
                    <div class="form-group has-feedback">
                        <input type="text" name="email" class="form-control" placeholder="邮箱" value="{{old('email')}}" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="code" class="form-control" placeholder="输入验证码" value="{{old('code')}}" required>
                        <a href="javascript:;" class="pull-right code"><h4><input type="button" id="btn" value="免费获取验证码" /> </h4></a>
                        </br>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="blog_url" class="form-control" placeholder="博客名称(链接)　例如: sheldon" value="{{old('blog_url')}}" required>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password"  name="password" class="form-control" placeholder="密码" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password"  name="password_confirmation" class="form-control" placeholder="确认密码" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">注册</button>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-xs-8"><a href='{{route('admin.auth.login.get')}}'><b>登陆</b> - 已有账号</a></div>
                        <div class="col-xs-4">
                            <a href=''>了解博客信息</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script type="text/javascript">
            require(['jquery'], function($) {

                $('#table-signup').on('click', '#btn', function() {
                    var email = $(":input[name='email']").val();
                    console.log(email);
                    if(!email){
                        alert('邮箱不能为空');
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

                              document.getElementById("btn").onclick=function(){time(this);}
                              var wait=60;
                              function time(o) {
                                  if (wait == 0) {
                                      o.removeAttribute("disabled");
                                      o.value="免费获取验证码";
                                      wait = 60;
                                  } else {
                                      o.setAttribute("disabled", true);
                                      o.value="重新发送(" + wait + ")";
                                      wait--;
                                      setTimeout(function() {
                                          time(o)
                                      },
                                      1000)
                                  }
                              }

                        }else {
                            alert(data.error);
                        }
                    });
                });
            });
        </script>
    </body>
</html>
