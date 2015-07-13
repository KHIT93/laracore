@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Delete <em>{{ $node->title }}</em></h1>
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
        <p>Are you sure that you want to completely remove <em>{{ $node->title }}</em> and all associated data?</p>
        <hr>
        <p>
            {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
            {!! Html::link('admin/content', 'No', ['class' => 'btn btn-default']) !!}
        </p>
        {!! Form::close() !!}
    </div>
</div>

@stop