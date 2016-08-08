@extends('front.layout')
@section('content')
<ul class="post-list">
    @foreach($articles as $article)
    <li class="post-list-item">
        <article id="post-vscode-extension-qiniu-upload" class="article article-type-post" itemprop="blogPost">
            <h3 class="post-title" itemprop="name">
                <a class="post-title-link" href="">{{$article->title}}</a>
            </h3>
            <div class="post-meta">
              <time datetime="2016-07-26T01:53:52.000Z" itemprop="datePublished" class="post-time">Jul 26, 2016</time>
            </div>

            <div class="post-content" id="post-content" itemprop="postContent">
                <h2 id="前言"><a href="" class="headerlink" title="前言">{{$article->description}}</a>
            </div>
            <ul class="article-tag-list">
                @foreach($article->tags as $tag)
                <li class="article-tag-list-item"><a class="article-tag-list-link waves-effect waves-button" href="">#{{$tag->name}}</a></li>
                @endforeach
            </ul>
        </article>
    </li>
    @endforeach
</ul>
<nav id="page-nav">
    <div class="inner">
        <span class="page-number current waves-effect waves-button">1</span><a class="page-number waves-effect waves-button" href="">2</a><a class="page-number waves-effect waves-button" href="http://www.imys.net/page/3/">3</a><span class="space waves-effect waves-button">…</span><a class="page-number waves-effect waves-button" href="http://www.imys.net/page/6/">6</a><a class="extend next waves-effect waves-button" rel="next" href="http://www.imys.net/page/2/">下一页</a>
    </div>
</nav>
@endsection
