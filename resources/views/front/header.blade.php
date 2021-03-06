<header class="header fixed" id="header">
    <div class="flex-row">
        <a href="javascript:;" class="header-icon waves-effect waves-circle waves-light on" id="menu-toggle">
            <i class="icon icon-lg icon-navicon"></i>
        </a>
        <div class="flex-col header-title ellipsis">{{$user->blog_url?:$user->email}}'s Blog</div>
        <form action="{{route('front.search.articles.index',$user->blog_url)}}" method="GET">
          <div class="search-wrap" id="search-wrap">
              <input type="text" id="key" class="search-input" name="search" placeholder="输入感兴趣的关键字">

              <a href="javascript:;" class="header-icon waves-effect waves-circle waves-light" id="search">
                  <i class="icon icon-lg icon-search"></i>
              </a>
              <button type="submit" hidden="hidden"></button>
          </div>
        </form>
        <a href="javascript:;" class="header-icon waves-effect waves-circle waves-light" id="menu-share">
            <i class="icon icon-lg icon-share-alt"></i>
        </a>
    </div>
</header>

<header class="content-header">
    <div class="container">
        <h1 class="author">{{$user->blog_url?:$user->email}}'s Blog</h1>
        <h5 class="subtitle">{{$user->description->brief}}</h5>
    </div>
</header>
