@extends('admin')
@section('header_info')
    Delete {{ $item->name }}
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Delete <em>{{ $item->name }}</em></h1>
    </div>
</div>

@stop

@section('content')

<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
        @include('errors._form_list')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        {!! Form::open() !!}
        <p>Are you sure that you want to completely remove <em>{{ $item->name }}</em>?</p>
        <hr>
        <p>
            {!! Form::submit('Yes', ['class' => 'btn btn-raised btn-danger']) !!}
            {!! Html::link('admin/menus/'.$menu->mid.'/links', 'No', ['class' => 'btn btn-raised btn-default']) !!}
        </p>
        {!! Form::close() !!}
    </div>
</div>

@stop