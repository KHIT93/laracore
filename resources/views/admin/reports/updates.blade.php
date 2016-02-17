@extends('admin')
@section('header_info')
    Available updates
@endsection

@section('header')

    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Available updates</h1>
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
            @if(count($updates))
            <table class="table">
                <tbody>
                    @foreach($updates as $update)
                        <tr>
                            <td>{{ $update->name }} - {{ $update->version }}</td>
                            <td>{{ $update->notes }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                Great! You are up-to-date
            @endif
        </div>
    </div>
@stop