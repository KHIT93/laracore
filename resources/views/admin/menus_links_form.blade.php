@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Add new menu item</h1>
</div>
@include('flash::message')
@include('errors._form_list')
<div class="col-sm-12">
    {!! Form::model($item) !!}
    <div class="form-group @if ($errors->has('name')) has-error @endif">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group @if ($errors->has('link')) has-error @endif">
        {!! Form::label('link', 'Destination') !!}
        {!! Form::text('link', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group @if ($errors->has('parent')) has-error @endif">
        {!! Form::label('parent', 'Parent link') !!}
        {!! Form::select('parent', $menu->item_list(), 0, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group @if ($errors->has('position')) has-error @endif">
        {!! Form::label('position', 'Position') !!}
        {!! Form::select('position', [range(-50, 50)], 50, ['class' => 'form-control']) !!}
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
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop