<head>
    <meta charset="UTF-8">
    <title>@yield('title', app('admin')->user()->nickname?:app('admin')->user()->email.'\'s Admin')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="/bower/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower/Ionicons/css/ionicons.min.css">
    <!-- style.min.css -->
    <link rel="stylesheet" href="/css/style.min.css">
    <!-- Theme style -->
    <link href="/bower/AdminLTE/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/bower/AdminLTE/plugins/morris/morris.css">
    <link rel="stylesheet" href="/bower/bootstrap-select/dist/css/bootstrap-select.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter-->
    <link href="/bower/AdminLTE/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/bower/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
    <!-- Datepicker -->
    <link href="/bower/AdminLTE/plugins/datepicker/datepicker3.css" rel="stylesheet" />
    <!-- Dropzone ***-->
    <link href='/css/dropzone.css' rel="stylesheet" />

    <link href='/css/admin.css' rel="stylesheet" />

    {{-- requrejs --}}
    <script src="/bower/requirejs/require.js"></script>
    <script src="/js/admin.js"></script>

</head>
