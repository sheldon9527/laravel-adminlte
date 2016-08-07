<footer class="main-footer">
    <div class="pull-right hidden-xs">
        {{app('admin')->user()->nickname?:app('admin')->user()->email}}
    </div>
    <strong>Copyright © 2015 <a href="https://github.com/sheldon9527">{{app('admin')->user()->nickname?:app('admin')->user()->email}}</a>.</strong> All rights reserved.
</footer>
