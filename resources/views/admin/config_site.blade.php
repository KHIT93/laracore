@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Site information</h1>
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
        {!! Form::open() !!}
        <div class="form-group @if ($errors->has('site_name')) has-error @endif">
            {!! Form::label('site_name', 'Site name') !!}
            {!! Form::text('site_name', Setting::get('site_name'), ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group @if ($errors->has('site_slogan')) has-error @endif">
            {!! Form::label('site_slogan', 'Site slogan') !!}
            {!! Form::text('site_slogan', Setting::get('site_slogan'), ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group @if ($errors->has('meta.robots')) has-error @endif">
            {!! Form::label('site_home', 'Select homepage') !!}
            {!! Form::select('site_home', $nodes, Setting::get('site_home'), ['class' => 'form-control']) !!}
        </div>
        <hr>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop