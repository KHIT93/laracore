<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('installer.laracore') }} | {{ trans('installer.app.slogan') }}</title>

    <link href="{{ asset('/css/installer.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/addons.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/bootstrap.vertical-tabs.min.css') }}" rel="stylesheet">
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
    {!! Form::open(['url' => $form_url, 'method' => $form_method]) !!}
    <div class="modal-content">
        <div class="modal-header">
            <h1>{{ trans('installer.laracore') }} <small>{{ trans('installer.app.slogan') }}</small></h1>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4 col-xs-1">
                    <ul class="nav nav-tabs tabs-left">
                        @include('installer._steps')
                    </ul>
                </div>
                <div class="col-md-8 col-xs-11">
                    @include($screen)
                </div>
            </div>
        </div>
        <div class="modal-footer">
            @if($btn_next['render']) <button type="submit" id="btn_next" class="btn btn-laravel" @if($btn_next['disabled']) disabled="disabled" @endif>{{ $btn_next['text'] }}</button> @endif
        </div>
    </div>
    {!! Form::close() !!}
</div>
<!-- Scripts -->
<script src="{{ asset('/js/plugins.js') }}"></script>
@include('installer._js')
</body>
</html>
