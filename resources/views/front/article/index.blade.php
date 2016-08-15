@extends('front.layout')
@section('content')
<div class="container body-wrap">
  @foreach($articles as $article)
  <h3 class="archive-separator"><?php echo date('Y', strtotime($article->created_at))?></h3>
    <article class="archive-article">
      <div class="archive-article-date">
         <time datetime="" itemprop="datePublished" class="post-time">
           <?php echo date('m-d', strtotime($article->created_at))?>
        </time>
      </div>
      <div class="archive-article-inner">
        <h3 class="post-title" itemprop="name">
           <a class="post-title-link" href="{{route('front.articles.show',[$user->blog_url,$article->id])}}">{{$article->title}}</a>
        </h3>
      <ul class="article-tag-list">
        @foreach($article->tags as $tag)
        <li class="article-tag-list-item">
          <a class="article-tag-list-link waves-effect waves-button" href="{{route('front.articles.index',$user->blog_url)}}?tag={{$tag->name}}">#{{$tag->name}}</a>
        </li>
        @endforeach
      </ul>
      </div>
    </article>
    @endforeach
</div>
@endsection
