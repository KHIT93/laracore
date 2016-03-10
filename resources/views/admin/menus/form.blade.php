@extends('admin')
@section('header_info')
    @if(is_null($menu->mid))Add new menu @else Edit menu: {{ $menu->name }} @endif
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">@if(is_null($menu->mid))Add new menu @else Edit menu: <em>{{ $menu->name }}</em> @endif</h1>
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
        {!! Form::model($menu) !!}
        <div class="form-group label-floating @if ($errors->has('name')) has-error @endif">
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('description')) has-error @endif">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>
        <hr>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-raised btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
