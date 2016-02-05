@extends('admin')
@section('header_info')
    Log entries
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Log entries</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @if(count($entries))
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Count</th>
                        <th>URL</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <td>{{ $entry->count }}</td>
                            <td>{{ $entry->url }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No log entries are available
            @endif
        </div>
    </div>
@stop