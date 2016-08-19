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
    <style type="text/css" media="screen">
    #page-nav {margin: 30px 0 0;text-align: center;}
    .pagination li {float: left; border:0; margin:0; padding:0; font-size:14px; list-style:none;border-radius: 3px;}
    .pagination .active {color: #fff;background: #3f51b5;}
    </style>
    <nav id="page-nav">
      <div class="inner">
          {!! $articles->render() !!}
      </div>
    </nav>
</div>
@endsection
