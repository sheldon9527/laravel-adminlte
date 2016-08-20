<header class="main-header">
    <a href="{{route('admin.dashboard')}}" class="logo">
        <span class="logo-mini"><b></b></span>
        <span class="logo-lg"><b>{{app('admin')->user()->blog_url?:app('admin')->user()->email}}</b></span>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="@if(env('APP_ENV')=='local'){{url(app('admin')->user()->avatar?:url('/images/default.png'))}} @else {{env('QINIU_DOMAIN').'/'.(app('admin')->user()->avatar)?:url('/images/default.png')}} @endif" class="user-image" alt="User Image" />
                        <span class="hidden-xs">{{app('admin')->user()->blog_url?:app('admin')->user()->email}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">

                            <img src="@if(env('APP_ENV')=='local'){{url(app('admin')->user()->avatar?:url('/images/default.png'))}} @else {{env('QINIU_DOMAIN').'/'.(app('admin')->user()->avatar)?:url('/images/default.png')}} @endif" class="img-circle" alt="User Image" />
                            <p>{{app('admin')->user()->blog_url?:app('admin')->user()->email}}</p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="{{ route('admin.auth.logout') }}" class="btn btn-default btn-flat">退出</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
