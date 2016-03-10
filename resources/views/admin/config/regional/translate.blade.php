@extends('admin')
@section('header_info')
    Translate resource
@endsection

@section('header')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Translate resource</h1>
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
            <div class="form-group label-floating">
                {!! Form::label('string', 'Original string', ['class' => 'control-label']) !!}
                {!! Form::text('string', $translation->string, ['class' => 'form-control disabled', 'disabled' => true]) !!}
            </div>
            <div class="form-group label-floating @if ($errors->has('maintenance_text')) has-error @endif">
                {!! Form::label('translation', 'Translation', ['class' => 'control-label']) !!}
                {!! Form::text('translation', $translation->translation, ['class' => 'form-control', 'required']) !!}
            </div>
            <hr>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-raised btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop