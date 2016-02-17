@extends('admin')
@section('header_info')
    Delete {{ $menu->name }}
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Delete <em>{{ $menu->name }}</em></h1>
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
        <p>Are you sure that you want to completely remove <em>{{ $menu->name }}</em> and all associated links?</p>
        <hr>
        <p>
            {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
            {!! Html::link('admin/menus', 'No', ['class' => 'btn btn-default']) !!}
        </p>
        {!! Form::close() !!}
    </div>
</div>

@stop