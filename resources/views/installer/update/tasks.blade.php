@extends('update')

@section('content')
    <div class="col-md-12">
        <h2>{{ trans('installer.update.tasks') }}</h2>
        @include('errors._form_list')
        <p>{!! trans('installer.update.tasknotes') !!}</p>
        @if(count($tasks))
        <div class="well well-sm">
            <ul>
                @foreach($tasks as $task)
                    <li>{!! $task !!}</li>
                @endforeach
            </ul>
        </div>
        @else
        <div class="well well-sm">
            <p>There are no database updates to run</p>
        </div>
        <a href="/" class="btn btn-default">Go home</a>
        @endif
    </div>
@endsection