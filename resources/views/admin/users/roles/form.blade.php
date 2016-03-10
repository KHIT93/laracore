@extends('admin')
@section('header_info')
    Edit role: {{ $role->name }}
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Edit role: <em>{{ $role->name }}</em></h1>
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
        {!! Form::model($role) !!}
        <div class="form-group label-floating @if ($errors->has('name')) has-error @endif">
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <hr>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-raised btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop