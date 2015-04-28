@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Site information</h1>
</div>
@include('flash::message')
@include('errors._form_list')
<div class="col-sm-12">
    {!! Form::open() !!}
    <div class="form-group">
        <div class="checkbox">
            <label>
                {!! Form::checkbox('site_maintenance', 1, Setting::get('site_maintenance')) !!}
                Put site into maintenance
            </label>
        </div>
    </div>
    <div class="form-group @if ($errors->has('site_slogan')) has-error @endif">
        {!! Form::label('maintenance_text', 'Site slogan') !!}
        {!! Form::textarea('maintenance_text', Setting::get('maintenance_text'), ['class' => 'form-control', 'required']) !!}
    </div>
    <hr>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop