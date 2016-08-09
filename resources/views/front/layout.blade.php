<!DOCTYPE html>
<html>
    @include('front.head')
    <body>
        @include('front.sider')
        <main id="main">
            @if(\Route::is('front.articles.show'))
            @include('front.article.header',['article'=>$article])
            @else
            @include('front.header')
            @endif
            <div class="container body-wrap">
            @yield('content')
            </div>
        </main>
        @include('front.foot')
    </body>
    @include('front.footer')
</html>
