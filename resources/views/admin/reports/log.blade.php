@extends('admin')
@section('header_info')
    Log entries
@endsection

@section('header')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Log entries</h1>
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
            {!! Form::open() !!}
            <p>
                {!! Form::submit('Clear log', ['class' => 'btn btn-default']) !!}
            </p>
            {!! Form::close() !!}
            @if(count($entries))
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Message</th>
                            <th>User</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <td>{{ $entry->type }}</td>
                            <td>{{ $entry->created_at }}</td>
                            <td>{{ $entry->message }}</td>
                            <td>{{ ($entry->uid != 0) ? $entry->user()->first()->name : 'Anonymous' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $entries->render() !!}
            @else
                No log entries are available
            @endif
        </div>
    </div>
@stop