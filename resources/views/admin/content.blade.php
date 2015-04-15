@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Content Management</h1>
            <a href="node/add" class="btn btn-default">Create</a>
        </div>
        <div class="col-sm-12">
            <table>
                <tbody>
                    @foreach($nodes as $node)
                    <tr>
                        <td>{{ $node->title }}</td>
                        <td>{{ $node->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop