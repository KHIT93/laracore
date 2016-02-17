@extends('admin')
@section('header_info')
    Edit text filter: {{ $filter->name }}
@endsection

@section('header')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Edit text filter: <em>{{ $filter->name }}</em></h1>
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
        <div class="form-group @if ($errors->has('description')) has-error @endif">
            {!! Form::label('description', 'Description') !!}
            {!! Form::text('description', $filter->description, ['class' => 'form-control']) !!}
        </div>
        @if($filter->type == \App\Libraries\StrFilter::RESTRICTED_HTML)
        <div class="form-group @if ($errors->has('allowed_tags')) has-error @endif">
            {!! Form::label('allowed_tags', 'Allowed HTML tags') !!}
            {!! Form::text('allowed_tags', $filter->allowed_tags, ['class' => 'form-control']) !!}
        </div>
        @endif
        <hr>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop