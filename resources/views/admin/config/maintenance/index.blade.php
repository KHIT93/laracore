@extends('admin')
@section('header_info')
    Site maintenance
@endsection

@section('header')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Site maintenance</h1>
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
        <div class="form-group">
            <div class="togglebutton">
                <label>
                    {!! Form::checkbox('site_maintenance', 1, Setting::get('site_maintenance')) !!}
                    Put site into maintenance
                </label>
            </div>
        </div>
        <div class="form-group label-floating @if ($errors->has('maintenance_text')) has-error @endif">
            {!! Form::label('maintenance_text', 'Maintenance message', ['class' => 'control-label']) !!}
            {!! Form::textarea('maintenance_text', Setting::get('maintenance_text'), ['class' => 'form-control', 'required']) !!}
        </div>
        <hr>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-raised btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop