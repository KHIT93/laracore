@extends('admin')
@section('header_info')
    @if(is_null($item->mlid))Add new menu item @else Edit menu item: {{ $item->name }} @endif
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">@if(is_null($item->mlid))Add new menu item @else Edit menu item: <em>{{ $item->name }}</em> @endif</h1>
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
        {!! Form::model($item) !!}
        <div class="form-group label-floating @if ($errors->has('name')) has-error @endif">
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('link')) has-error @endif">
            {!! Form::label('link', 'Destination', ['class' => 'control-label']) !!}
            {!! Form::text('link', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group @if ($errors->has('parent')) has-error @endif">
            {!! Form::label('parent', 'Parent link') !!}
            {!! Form::select('parent', $menu->item_list(), 0, ['class' => 'form-control select2-basic']) !!}
        </div>
        <div class="form-group @if ($errors->has('position')) has-error @endif">
            {!! Form::label('position', 'Position') !!}
            {!! Form::select('position', [range(-50, 50)], 50, ['class' => 'form-control select2']) !!}
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('active', 1, true) !!}
                    Enabled
                </label>
            </div>
        </div>
        {!! Form::hidden('icon', 'none') !!}
        <hr>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-raised btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop