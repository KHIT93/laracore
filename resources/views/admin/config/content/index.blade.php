@extends('admin')
@section('header_info')
    Content authoring
@endsection

@section('header')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Content authoring</h1>
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
            <h2>Node Revisions</h2>
            <p>Node revisions is a way of saving a previous version of a node. With revisions it is possible to go back to a previous version of a node</p>
            <div class="checkbox">
                <label>
                    {!! Form::checkbox('node_revision', 1, Setting::get('node_revision')) !!}
                    Enable Node Revisioning
                </label>
            </div>
        </div>
        <hr>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-raised btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop