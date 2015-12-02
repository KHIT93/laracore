@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Install new theme</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
        @include('errors._form_list')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        {!! Form::open(['files' => true]) !!}
        <p>You can find new modules and themes in the Laracore extra repository on the Laracore website or install from third party sources</p>
        <hr>
        <div class="col-sm-6 col-xs-12">
            <div class="form-group @if ($errors->has('theme_url')) has-error @endif">
                {!! Form::label('theme_url', 'Install from an URL') !!}
                {!! Form::text('theme_url', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group @if ($errors->has('theme_file')) has-error @endif">
                {!! Form::label('theme_file', 'Upload a module archive to install') !!}
                {!! Form::file('theme_file', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Install', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@stop