@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">@if($block && !is_null($block->bid)) Edit <em>{{ $block->title }}</em> @else Add new block @endif</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
        @include('errors._form_list')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        {!! Form::model($block) !!}
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-main" data-target="#tab-main" data-toggle="tab" aria-expanded="true">Content</a></li>
            <li><a href="#tab-meta" data-target="#tab-meta" data-toggle="tab" aria-expanded="false">Metadata</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab-main">
                <br>
                <div class="form-group @if ($errors->has('title')) has-error @endif">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
                    <span class="help-block">This field contains the title of the block. This will be displayed to the visitors of the website. This field can be left blank in order to not display a title</span>
                </div>
                <div class="form-group @if ($errors->has('description')) has-error @endif">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::text('description', null, ['class' => 'form-control', 'required']) !!}
                    <span class="help-block">This field contains a description of the block. This will not be shown to the visitors of the website</span>
                </div>
                <div class="form-group @if ($errors->has('body')) has-error @endif">
                    {!! Form::label('body', 'Body') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group @if ($errors->has('section')) has-error @endif">
                    {!! Form::label('section', 'Section') !!}
                    {!! Form::select('section', Theme::sections(), (($block->section) ? $block->section : 0), ['class' => 'form-control select2']) !!}
                </div>
                <div class="form-group @if ($errors->has('position')) has-error @endif">
                    {!! Form::label('position', 'Position') !!}
                    {!! Form::select('position', range(0, 15), 0, ['class' => 'form-control select2']) !!}
                </div>
            </div>
            <div class="tab-pane fade in" id="tab-meta">
                <br>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            {!! Form::radio('visibility', 0, false) !!}
                            Show for the listed pages
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            {!! Form::radio('visibility', 1, true) !!}
                            Hide for the listed pages
                        </label>
                    </div>
                </div>
                <div class="form-group @if ($errors->has('pages')) has-error @endif">
                    {!! Form::label('pages', 'Pages') !!}
                    {!! Form::textarea('pages', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <hr>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop