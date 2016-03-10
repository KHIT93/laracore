@extends('admin')
@section('header_info')
    Content Management
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">{!! FA::icon('files-o') !!} Content Management</h1>
        <p><a href="{{ url('node/add') }}" class="btn btn-raised btn-default">{!! FA::icon('plus') !!} Create</a></p>
    </div>
</div>

@stop

@section('content')

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
                        {!! Html::link('node/'.$node->nid, 'View', ['class' => 'btn btn-raised btn-default']) !!}
                        {!! Html::link('node/'.$node->nid.'/edit', 'Edit', ['class' => 'btn btn-raised btn-primary']) !!}
                        {!! Html::link('node/'.$node->nid.'/delete', 'Delete', ['class' => 'btn btn-raised btn-danger']) !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $nodes->render() !!}
        @else
        <p>There is currently no content on the website. Why not {!! Html::link('node/add', 'create') !!} something for your visitors to look at?</p>
        @endif
    </div>
</div>
@stop