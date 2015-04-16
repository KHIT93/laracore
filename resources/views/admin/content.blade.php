@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Content Management</h1>
            <p><a href="{{ url('node/add') }}" class="btn btn-default">Create</a></p>
        </div>
        <div class="col-sm-12">
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
                        <td>{{ $node->updated_at->format('d-m-Y H:i:s') }}</td>
                        <td>
                            {!! Html::link('node/'.$node->nid, 'View', ['class' => 'btn btn-default']) !!}
                            {!! Html::link('node/'.$node->nid.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
                            {!! Html::link('node/'.$node->nid.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop