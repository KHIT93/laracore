@extends('admin')
@section('header_info')
    Custom blocks
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">{!! FA::icon('list-alt') !!} Custom blocks</h1>
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
        <ul class="nav nav-tabs">
            <li><a href="/admin/blocks">Block placement</a></li>
            <li class="active"><a href="/admin/blocks/custom">Custom blocks</a></li>
        </ul><br>
        <p><a href="{{ url('admin/blocks/add') }}" class="btn btn-default">{!! FA::icon('plus') !!} Create custom block</a></p>
        @if(count($blocks))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Last updated</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($blocks as $block)
                <tr>
                    <td>{!! Html::link('admin/blocks/'.$block->bid.'/edit', $block->title) !!}</td>
                    <td>{{ $block->updated_at->diffForHumans() }}</td>
                    <td>
                        {!! Html::link('admin/blocks/'.$block->bid.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
                        {!! Html::link('admin/blocks/'.$block->bid.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $blocks->render() !!}
        @else
        <p>There is currently no content on the website. Why not {!! Html::link('admin/blocks/add', 'create') !!} something for your visitors to look at?</p>
        @endif
    </div>
</div>
@stop