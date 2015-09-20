<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('installer.already.header') }}</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.vertical-tabs.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/installer.css') }}" rel="stylesheet">
    <link href="{{ asset('/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="installer">
<div class="container">
    <div class="modal-content">
        <div class="modal-header">
            <h1>{{ trans('installer.laracore') }} <small>{{ trans('installer.app.slogan') }}</small></h1>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ trans('installer.already.header') }}</h2>
                    <hr>
                    <p>{!! trans('installer.already.info') !!}:</p>
                    <ul>
                        <li>{!! trans('installer.already.startover') !!}</li>
                        <li>{!! trans('installer.already.artisan') !!}</li>
                    </ul>
                    <h3 class="text-center">{{ trans('installer.already.mistake') }}</h3>
                    <hr>
                    <div class="row">
                        <div class="col-xs-6 text-center">
                            <a href="/admin" class="laravel-link">
                                <i class="fa fa-lock fa-6x"></i><br>
                                {{ trans('installer.admin') }}
                            </a>
                        </div>
                        <div class="col-xs-6 text-center">
                            <a href="/" class="laravel-link">
                                <i class="fa fa-desktop fa-6x"></i><br>
                                {{ trans('installer.frontend') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('/js/plugins.js') }}"></script>
@if(Request::path() == 'installer/run')
    <script src="{{ asset('/js/installer.js') }}"></script>
@endif
</body>
</html>
