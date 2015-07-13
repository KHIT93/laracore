@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Scheduled tasks</h1>
</div>
@include('flash::message')
@include('errors._form_list')
<div class="col-sm-12">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab-main">
            @if(count($redirects))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Path</th>
                        <th>Destination</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($redirects as $redirect)
                    <tr>
                        <td>{{ $redirect->alias }}</td>
                        <td>{{ $redirect->node()->first()->title }}</td>
                        <td>{{ $redirect->created_at->diffForHumans() }}</td>
                        <td>{!! Html::link('admin/config/redirect/'.$redirect->id.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            @else
            <p>There are currently no redirects in the system</p>
            @endif
            <h2>Create new redirection</h2>
            <hr>
            {!! Form::open(['url' => 'admin/config/redirect/add']) !!}
            <div class="form-group">
                {!! Form::label('alias', 'Path') !!}
                {!! Form::text('alias', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group @if ($errors->has('meta.robots')) has-error @endif">
                {!! Form::label('nid', 'Select content') !!}
                {!! Form::select('nid', \App\Node::all()->lists('title', 'nid'), null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop