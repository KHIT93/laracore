@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Edit role: <em>{{ $role->name }}</em></h1>
</div>
@include('flash::message')
@include('errors._form_list')
<div class="col-sm-12">
    {!! Form::model($role) !!}
    <div class="form-group @if ($errors->has('name')) has-error @endif">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <hr>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop