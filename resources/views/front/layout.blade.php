<!doctype html>
<html>
    @include('front.head')
    <body>
        @include('front.header')
            <article>
                @yield('content')
            </article>
        @include('front.footer')
    </body>
</html>
