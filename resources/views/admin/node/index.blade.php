@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">{!! FA::icon('files-o') !!} Content Management</h1>
        <p><a href="{{ url('node/add') }}" class="btn btn-default">Create</a></p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if(count($nodes))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Last updated</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($nodes as $node)
                <tr>
                    <td>{!! Html::link('node/'.$node->nid, $node->title) !!}</td>
                    <td>{{ $node->author()->first()->name }}</td>
                    <td>{{ $node->updated_at->diffForHumans() }}</td>
                    <td>
                        {!! Html::link('node/'.$node->nid, 'View', ['class' => 'btn btn-default']) !!}
                        {!! Html::link('node/'.$node->nid.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
                        {!! Html::link('node/'.$node->nid.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>There is currently no content on the website. Why not {!! Html::link('node/add', 'create') !!} something for your visitors to look at?</p>
        @endif
    </div>
</div>
@stop