@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Add new user</h1>
</div>
@include('flash::message')
@include('errors._form_list')
<div class="col-sm-12">
    {!! Form::model($user) !!}
    <div class="form-group @if ($errors->has('name')) has-error @endif">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group @if ($errors->has('description')) has-error @endif">
        {!! Form::label('email', 'Email Address') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group @if ($errors->has('name')) has-error @endif">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group @if ($errors->has('name')) has-error @endif">
        {!! Form::label('password_confirmation', 'Confirm Password') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group @if ($errors->has('meta.robots')) has-error @endif">
        {!! Form::label('role', 'Select user role') !!}
        {!! Form::select('role', $roles, ((isset($user->roles()->first()->id)) ? $user->roles()->first()->id : 4), ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <div class="checkbox">
            <label>
                {!! Form::checkbox('enabled', 1, ((isset($user->enabled)) ? (bool)$user->enabled : false)) !!}
                Enabled
            </label>
        </div>
    </div>
    <hr>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop