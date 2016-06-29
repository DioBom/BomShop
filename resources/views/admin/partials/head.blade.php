<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('admin.app_name') }} | {{ $_title or ''}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Laravel's CSRF Protection -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ Admin::staticAsset('bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ Admin::staticAsset('font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    {{--<link rel="stylesheet" href="{{ asset('assets/static/ionicons/css/ionicons.min.css') }}">--}}
    <!-- jvectormap -->
    <!-- Admin style -->
    <link rel="stylesheet" href="{{ Admin::asset('css/AdminLTE.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ Admin::asset('css/skins/_all-skins.min.css') }}">

    <link rel="stylesheet" href="{{ Admin::pluginAsset('iCheck/square/blue.css') }}">

    @section('css')
    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//apps.bdimg.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>