@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>Scheduled tasks</h1>
</div>
@include('flash::message')
@include('errors._form_list')
<div class="col-sm-12">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab-main">
            <br>
            {!! Form::open() !!}
            <div class="form-group @if ($errors->has('meta.robots')) has-error @endif">
                {!! Form::label('cron_interval', 'Run scheduled tasks every:') !!}
                {!! Form::select('cron_interval', [
                    60 => '1 minute',
                    300 => '5 minutes',
                    600 => '10 minutes',
                    1800 => '30 minutes',
                    3600 => '1 hour',
                    10800 => '3 hours',
                    21600 => '6 hours',
                    43200 => '12 hours',
                    86400 => '24 hours',
                    259200 => '3 days',
                    604800 => '1 week'
                ],Setting::get('cron_interval'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Change settings', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            <hr>
            @if(count($tasks))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Module</th>
                        <th>Method</th>
                        <th>Paramters</th>
                        <th>Last executed</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->module }}</td>
                        <td>{{ $task->delta }}</td>
                        <td>{{ $task->params }}</td>
                        <td>{{ $task->updated_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! Form::open(['url' => 'admin/config/system/cron-execute']) !!}
            <div class="form-group">
                {!! Form::submit('Run all scheduled tasks now', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            @else
            <p>There are currently no scheduled tasks in the system</p>
            @endif
        </div>
    </div>
</div>
@stop