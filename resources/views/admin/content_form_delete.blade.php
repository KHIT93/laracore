@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Delete <em>{{ $node->title }}</em></h1>
</div>
@include('flash::message')
<div class="col-sm-12">
    {!! Form::open() !!}
    <p>Are you sure that you want to completely remove <em>{{ $node->title }}</em> and all associated data?</p>
    <hr>
    <p>
        {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
        {!! Html::link('admin/content', 'No', ['class' => 'btn btn-default']) !!}
    </p>
    {!! Form::close() !!}
</div>

@stop