@extends('admin')
@section('header_info')
    Disable {{ $slug }}
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Disable <em>{{ $slug }}</em></h1>
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
        <p>Are you sure that you want to disable <em>{{ $slug }}</em>?</p>
        <p>This will disable the module, but any data will still be there for future use.</p>
        <hr>
        <p>
            {!! Form::submit('Yes', ['class' => 'btn btn-danger']) !!}
            {!! Html::link('admin/modules', 'No', ['class' => 'btn btn-default']) !!}
        </p>
        {!! Form::close() !!}
    </div>
</div>

@stop