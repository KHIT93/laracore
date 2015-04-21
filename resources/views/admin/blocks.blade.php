@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>{!! FA::icon('list-alt') !!} Blocks</h1>
    <p><a href="{{ url('admin/blocks/add') }}" class="btn btn-default">Create</a></p>
</div>
<div class="col-sm-12">
    @include('flash::message')
</div>
<div class="col-sm-12">
    @if(count($blocks))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blocks as $block)
            <tr>
                <td>
                    {{ $block->title }}
                </td>
                <td>{{ ucfirst($block->section) }}</td>
                <td>
                    {!! Html::link('admin/blocks/'.$block->bid.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
                    {!! Html::link('admin/blocks/'.$block->bid.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>There are no blocks created. Something must be wrong with your installation.</p>
    @endif
</div>

@stop