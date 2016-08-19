<div class="post-footer flex-row flex-middle">
    <div class="flex-col">
           <ul class="article-tag-list">
               @foreach($article->tags as $tag)
               <li class="article-tag-list-item">
                   <a class="article-tag-list-link waves-effect waves-button" href="{{route('front.articles.index',$user->blog_url)}}?tag={{$tag->name}}">#{{$tag->name}}</a>
               </li>
               @endforeach
           </ul>
    </div>
    <div class="post-share-wrap">
        <div class="post-share" id="post-share">
            <div class="tit">分享到：</div>
            <ul class="reset share-icons">
              <li>
                <a class="weibo share-sns" href="javascript:;" data-title="微博" data-service="tsina">
                  <i class="icon icon-weibo"></i>
                </a>
              </li>
              <li>
                <a class="weixin share-sns" href="javascript:;" data-title="微信" data-service="weixin">
                  <i class="icon icon-weixin"></i>
                </a>
              </li>
              <li>
                <a class="qq share-sns" href="javascript:;" data-title=" QQ" data-service="cqq">
                  <i class="icon icon-qq"></i>
                </a>
              </li>
              <li>
                <a class="facebook share-sns" href="javascript:;" data-title=" Facebook" data-service="fb">
                  <i class="icon icon-facebook"></i>
                </a>
              </li>
              <li>
                <a class="twitter share-sns" href="javascript:;" data-title=" Twitter" data-service="twitter">
                  <i class="icon icon-twitter"></i>
                </a>
              </li>
              <li>
                <a class="douban share-sns" href="javascript:;" data-title="豆瓣" data-service="douban">
                  豆
                </a>
              </li>
            </ul>
        </div>
        <a href="javascript:;" id="share-fab" class="post-share-fab waves-effect waves-circle">
            <i class="icon icon-share-alt"></i>
        </a>
    </div>
</div>
<nav class="post-nav">
  @if($perArticle)
    <div class="waves-block waves-effect prev fl">
      <a href="{{route('front.articles.show',[$user->blog_url,$perArticle->id])}}" id="post-prev" class="post-nav-link">
        <div class="tips"><i class="icon icon-angle-left icon-lg icon-pr"></i> Prev</div>
        <h4 class="title">{{$perArticle->title}}</h4>
      </a>
    </div>
    @endif
    @if($nextArticle)
    <div class="waves-block waves-effect next fr">
      <a href="{{route('front.articles.show',[$user->blog_url,$nextArticle->id])}}" id="post-next" class="post-nav-link">
        <div class="tips">Next <i class="icon icon-angle-right icon-lg icon-pl"></i></div>
        <h4 class="title">{{$nextArticle->title}}</h4>
      </a>
    </div>
    @endif
</nav>
