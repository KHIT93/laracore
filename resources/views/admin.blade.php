<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('header_info', 'Administration')</title>

    <!-- Material Design fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/admin-extra.css') }}" rel="stylesheet">
    <link href="{{ asset('/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
    @yield('header-styles')
    @yield('header-fonts')
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    @yield('header-scripts')
    @yield('header-others')
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('admin.partials._navbar')
            @include('admin.partials._sidebar')
        </nav>
        <div id="page-wrapper">
            @section('header')
            @show
            {!! Breadcrumbs::renderIfExists() !!}

            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('/js/admin.plugins.js') }}"></script>
    @yield('bottom-scripts')
    <script>
        //$(function (){
            $.material.init();
        //});
    </script>
</body>
</html>
