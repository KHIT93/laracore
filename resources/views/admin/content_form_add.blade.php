@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Add new node</h1>
</div>
@include('flash::message')
@include('errors._form_list')
<div class="col-sm-12">
    {!! Form::open() !!}
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-main" data-target="#tab-main" data-toggle="tab" aria-expanded="true">Content</a></li>
        <li><a href="#tab-meta" data-target="#tab-meta" data-toggle="tab" aria-expanded="false">Metadata</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab-main">
            <br>
            <div class="form-group @if ($errors->has('content.title')) has-error @endif">
                {!! Form::label('content[title]', 'Title') !!}
                {!! Form::text('content[title]', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group @if ($errors->has('content.body')) has-error @endif">
                {!! Form::label('content[body]', 'Body') !!}
                {!! Form::textarea('content[body]', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        {!! Form::checkbox('content[published]', 1, true) !!}
                        Published
                    </label>
                </div>
            </div>
            <fieldset>
                <legend>URL</legend>
                <div class="form-group @if ($errors->has('url.alias')) has-error @endif">
                    <div class="input-group">
                        <div class="input-group-addon">{{ URL::to('/') }}/</div>
                        {!! Form::text('url[alias]', null, ['class' => 'form-control']) !!}
                    </div>
                    <span class="help-block">If this field is left empty a URL will be generated for you. This URL will be based on the page title.</span>
                </div>
            </fieldset>


        </div>
        <div class="tab-pane fade in" id="tab-meta">
            <br>
            <div class="form-group @if ($errors->has('meta.title')) has-error @endif">
                {!! Form::label('meta[title]', 'Meta Title') !!}
                {!! Form::text('meta[title]', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group @if ($errors->has('meta.keywords')) has-error @endif">
                {!! Form::label('meta[keywords]', 'Meta Keywords') !!}
                {!! Form::text('meta[keywords]', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group @if ($errors->has('meta.description')) has-error @endif">
                {!! Form::label('meta[description]', 'Meta Description') !!}
                {!! Form::text('meta[description]', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group @if ($errors->has('meta.robots')) has-error @endif">
                {!! Form::label('meta[description]', 'Search Engines') !!}
                {!! Form::select('meta[robots]', [
                    'noindex,nofollow' => 'No indexing and no following',
                    'index,nofollow' => 'Index, but do not follow',
                    'noindex,follow' => 'Follow, but do not index',
                    'index,follow' => 'Index and Follow',
                ],'index,follow', ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
@stop