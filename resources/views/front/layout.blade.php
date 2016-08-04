<!DOCTYPE html>
<html>
    @include('front.head')
    <body>
        @include('front.sider')
        <main id="main">
            @include('front.header')
            <div class="container body-wrap">
            @yield('content')
            </div>
        </main>
        @include('front.foot')
    </body>
    @include('front.footer')
</html>
