<div class="mask" id="mask"></div>
<a href="javascript:;" id="gotop" class="waves-effect waves-circle waves-light in">
    <span class="icon icon-lg icon-chevron-up"></span>
</a>
<script>
var BLOG_SHARE = {
    title: "{{$user->blog_url?:$user->email}}'s Blog",
    pic: "/images/logo.jpg",
    summary: document.getElementsByName('summary')[0].content,
    url: ""
};
</script>
<div class="global-share" id="global-share">
    <div class="tit">分享到：</div>
    <ul class="reset share-icons">
        <li class=" waves-effect waves-block">
            <a class="weibo share-sns" href="javascript:;" data-title="微博" data-service="tsina">
            <i class="icon icon-weibo"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="weixin share-sns" href="javascript:;" data-title="微信" data-service="weixin">
            <i class="icon icon-weixin"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="qq share-sns" href="javascript:;" data-title=" QQ" data-service="cqq">
            <i class="icon icon-qq"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="facebook share-sns" href="javascript:;" data-title=" Facebook" data-service="fb">
            <i class="icon icon-facebook"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="twitter share-sns" href="javascript:;" data-title=" Twitter" data-service="twitter">
            <i class="icon icon-twitter"></i>
            </a>
        </li>
        <li class=" waves-effect waves-block">
            <a class="douban share-sns" href="javascript:;" data-title="豆瓣" data-service="douban">
            豆瓣
            </a>
        </li>
    </ul>
</div>

<script src="/front/js/waves.min.js"></script>
<script src="/front/js/main.js"></script>

<div class="search-panel" id="search-panel">
    <ul class="search-result" id="search-result"></ul>
</div>
<script type="text/template" id="search-tpl">
<li class="item">
    <a href="/{path}" class="waves-block waves-effect">
        <div class="title ellipsis" title="{title}">{title}</div>
        <div class="flex-row flex-middle">
            <div class="tags ellipsis">
                {tags}
            </div>
            <time class="flex-col time">{date}</time>
        </div>
    </a>
</li>
</script>

<script src="/front/js/search.js"></script>
