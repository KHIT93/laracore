@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Delete <em>{{ $user->name }}</em></h1>
</div>
@include('flash::message')
<div class="col-sm-12">
    {!! Form::open() !!}
    <p>Are you sure that you want to completely remove <em>{{ $user->name }}</em>?</p>
    <hr>
    <p>
        {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
        {!! Html::link('admin/users', 'No', ['class' => 'btn btn-default']) !!}
    </p>
    {!! Form::close() !!}
</div>

@stop