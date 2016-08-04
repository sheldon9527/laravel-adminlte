<aside class="main-sidebar">
    <div class="slimScrollDiv">
        <div class="sidebar" id="scrollspy">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('/images/admin-avatar.jpg')}}" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">
                    <p></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
                <li class="header">管理</li>
                <li class="active treeview"><a href="#"><i class="fa fa-dashboard"></i> <span>首页</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="#"><i class="fa fa-circle-o"></i>最近关注</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>最近留言</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>博客PV</a></li>
                    </ul>
                </li>
                <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i><span>文章管理</span><span class="label label-primary pull-right"></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('admin.articles.create')}}"><i class="fa fa-circle-o"></i>添加文章</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>文章列表</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-th"></i> <span>个人简历</span><small class="label pull-right bg-green">new</small></a>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-pie-chart"></i><span>慢生活</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>关于我</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>相册</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>碎言碎语</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-laptop"></i><span>设置</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i>基本信息</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i>社交账号</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
