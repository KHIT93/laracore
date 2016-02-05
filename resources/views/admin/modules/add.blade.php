@extends('admin')
@section('header_info')
    Install new module
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Install new module</h1>
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
            <div class="form-group @if ($errors->has('module_url')) has-error @endif">
                {!! Form::label('module_url', 'Install from an URL') !!}
                {!! Form::text('module_url', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group @if ($errors->has('module_file')) has-error @endif">
                {!! Form::label('module_file', 'Upload a module archive to install') !!}
                {!! Form::file('module_file', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Install', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@stop