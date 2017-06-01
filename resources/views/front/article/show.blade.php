@extends('front.layout')
@section('content')
<div class="container body-wrap">
    <article id="post-mobile-page-size-and-layout" class="article article-type-post" itemprop="blogPost">
        <div class="post-body">
            <aside class="post-widget" id="post-widget">

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
