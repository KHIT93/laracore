@extends('admin')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Regional settings</h1>
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
            <div class="form-group @if ($errors->has('site_home')) has-error @endif">
                {!! Form::label('site_language', 'Select homepage') !!}
                {!! Form::select('site_language', ['en' => 'English', 'da' => 'Dansk', 'de' => 'Deutsch'], Setting::get('site_language'), ['class' => 'form-control select2']) !!}
            </div>
            <hr>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop