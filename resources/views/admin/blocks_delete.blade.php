@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Delete <em>{{ $block->title }}</em></h1>
</div>
@include('flash::message')
<div class="col-sm-12">
    {!! Form::open() !!}
    <p>Are you sure that you want to completely remove <em>{{ $block->title }}</em>?</p>
    <hr>
    <p>
        {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
        {!! Html::link('admin/menus', 'No', ['class' => 'btn btn-default']) !!}
    </p>
    {!! Form::close() !!}
</div>

@stop