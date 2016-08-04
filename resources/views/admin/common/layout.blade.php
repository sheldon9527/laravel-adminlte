<!DOCTYPE html>
<html>
@include('admin.common.head')
<body class="hold-transition skin-blue sidebar-mini">
    @include('admin.common.header')
    @include('admin.common.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                @yield('title', app('admin')->user()->email)
                <small>@yield('page_description', null)</small>
            </h1>
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('admin.common.footer')
</body>
</html>
