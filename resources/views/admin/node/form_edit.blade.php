@extends('admin')
@section('header_info')
    Edit {{ $node->title }}
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Edit <em>{{ $node->title }}</em></h1>
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
        {!! Form::model($node) !!}
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-main" data-target="#tab-main" data-toggle="tab" aria-expanded="true">Content</a></li>
            <li><a href="#tab-meta" data-target="#tab-meta" data-toggle="tab" aria-expanded="false">Metadata</a></li>
            @if(count($node->revisions)) <li><a href="#tab-revision" data-target="#tab-revision" data-toggle="tab" aria-expanded="false">Revisions</a></li> @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab-main">
                <br>
                @include('admin.partials._content_form')

            </div>
            @include('admin.partials._content_form_metadata')
            @if(count($node->revisions)) @include('admin.partials._content_revisions') @endif
        </div>
        <hr>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            {!! Html::link('admin/content', 'Cancel', ['class' => 'btn btn-default']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="modal fade" id="redirectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add new URL alias for node {{ $node->title }}</h4>
            </div>
            <div class="modal-body">
              @include('admin.partials._redirect_form', ['source' => 'node/'.$node->nid])
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop
@section('bottom-scripts')
    <script src="{{ asset('/js/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('/js/ckeditor.config.js') }}"></script>
@endsection