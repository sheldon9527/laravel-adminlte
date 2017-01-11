<aside class="main-sidebar">
    <div class="slimScrollDiv">
        <div class="sidebar" id="scrollspy">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="@if(env('APP_ENV')=='local'){{url(app('admin')->user()->avatar?:url('/images/default.png'))}} @else {{env('QINIU_DOMAIN').'/'.(app('admin')->user()->avatar)?:url('/images/default.png')}} @endif" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p></p>
                    <a href="{{route('admin.users.edit')}}"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                      <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            <ul class="sidebar-menu">
                <li class="active treeview"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>仪表盘</span> </a>
                </li>
                <li class="{{
                        \Route::is('admin.articles.*', 'admin.categories.*', 'admin.tags.*') ? 'active' : null
                    }} treeview"><a href="#"><i class="glyphicon glyphicon-pencil"></i> <span>文章</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="{{
                                \Route::is('admin.articles.index') ? 'active' : null
                            }} treeview"><a href="{{route('admin.articles.index')}}"><i class="glyphicon glyphicon-book"></i>所有文章</a></li>
                        <li class="{{
                                \Route::is('admin.articles.create') ? 'active' : null
                            }} treeview"><a href="{{route('admin.articles.create')}}"><i class="glyphicon glyphicon-pencil"></i>写文章</a></li>
                        <li class="{{
                                \Route::is('admin.categories.index') ? 'active' : null
                            }} treeview"><a href="{{route('admin.categories.index')}}"><i class="glyphicon glyphicon-bookmark"></i>分类目录</a></li>
                        <li class="{{
                                \Route::is('admin.tags.index') ? 'active' : null
                            }} treeview"><a href="{{route('admin.tags.index')}}"><i class="glyphicon glyphicon-tags"></i>标签</a></li>
                    </ul>
                </li>
                <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i><span>博客动态</span><span class="label label-primary pull-right"></span></a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="#"><i class="fa fa-circle-o"></i>最近关注</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>最近留言</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>博客PV</a></li>
                    </ul>
                </li>
                <li>
                    <a href="http://zhangxiang.pub:3000/"><i class="fa fa-th"></i> <span>个人简历</span><small class="label pull-right bg-green">new</small></a>
                </li>
                <li class="{{
                        \Route::is('admin.albums.*') ? 'active' : null
                    }} treeview">
                    <a href="#"><i class="fa fa-pie-chart"></i><span>慢生活</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>关于我</a></li>
                        <li class="{{
                                \Route::is('admin.albums.index') ? 'active' : null
                            }} treeview"><a href="{{route('admin.albums.index')}}"><i class="fa fa-circle-o"></i>相册</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>碎言碎语</a></li>
                    </ul>
                </li>
                <li class="{{
                        \Route::is('admin.users.*') ? 'active' : null
                    }} treeview">
                    <a href="#"><i class="fa fa-laptop"></i><span>设置</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="{{
                                \Route::is('admin.users.blog.*') ? 'active' : null
                            }} treeview"><a href="{{route('admin.users.blog.edit')}}"><i class="fa fa-circle-o"></i>博客设置<small class="label pull-right bg-green">must</small></a></li>
                        <li class="{{
                                \Route::is('admin.users.edit','admin.users.update') ? 'active' : null
                            }} treeview"><a href="{{route('admin.users.edit')}}"><i class="fa fa-circle-o"></i>基本信息</a></li>
                        <li class="{{
                                \Route::is('admin.users.email.*') ? 'active' : null
                            }} treeview"><a href="{{route('admin.users.email.edit')}}"><i class="fa fa-circle-o"></i>修改邮箱</a></li>
                        <li class="{{
                                \Route::is('admin.users.password.*') ? 'active' : null
                            }} treeview"><a href="{{route('admin.users.password.edit')}}"><i class="fa fa-circle-o"></i>修改密码</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
