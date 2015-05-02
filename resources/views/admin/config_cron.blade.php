@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Scheduled tasks</h1>
</div>
@include('flash::message')
@include('errors._form_list')
<div class="col-sm-12">
    {!! Form::model($node) !!}
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-main" data-target="#tab-main" data-toggle="tab" aria-expanded="true">Content</a></li>
        <li><a href="#tab-meta" data-target="#tab-meta" data-toggle="tab" aria-expanded="false">Metadata</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab-main">
            <br>
            @include('admin.partials._content_form')
            @if(count($urls))
            <fieldset>
                <legend>URL</legend>
                <table class="table table-striped">
                    <tbody>
                        @foreach($urls as $url)
                        <tr>
                            <td>{{ $url->alias }}</td>
                            <td>{!! Html::link('admin/config/redirects/'.$url->alias.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="2">{!! Form::button('Add', ['class' => 'btn btn-info', 'data-toggle' => 'modal', 'data-target' => '#redirectModal']) !!}</td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            @endif
        </div>
        @include('admin.partials._content_form_metadata')
    </div>
    <hr>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        {!! Html::link('admin/content', 'Cancel', ['class' => 'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
</div>
<div class="modal fade" id="redirectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Add new URL alias for node {{ $node->title }}</h4>
            </div>
            <div class="modal-body">
              @include('admin.partials._redirect_form')
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@stop