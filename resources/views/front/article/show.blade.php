@extends('front.layout')
@section('content')
<div class="container body-wrap">
    <article id="post-mobile-page-size-and-layout" class="article article-type-post" itemprop="blogPost">
        <div class="post-body">
            <aside class="post-widget" id="post-widget">
                <nav class="post-toc-wrap" id="post-toc">
                    <h4>TOC</h4>
                    <ol class="post-toc">
                        <?php $tocs = explode(',', $article->catalog)?>
                        @foreach($tocs as $toc)
                        <li class="post-toc-item post-toc-level-2">
                            <a class="post-toc-link" href="#{{$toc}}"><span class="post-toc-number">1.</span><span class="post-toc-text">{{$toc}}</span></a>
                        </li>
                        @endforeach
                    </ol>
                </nav>
            </aside>
            <div class="post-main">
                <div class="post-content" id="post-content" itemprop="postContent">
                    <?php echo $article->content ?>
                </div>
                @include('front.article.footer',['article'=>$article])
            </div>
        </div>
    </article>
</div>
@endsection
