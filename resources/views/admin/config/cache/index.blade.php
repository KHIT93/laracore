@extends('admin')
@section('header_info')
    Cache Management
@endsection

@section('header')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Caching</h1>
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
            <p>Manage the application caches</p>
            {!! Form::open() !!}
            <div class="form-group">
                {!! Form::submit('Clear all application caches', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop