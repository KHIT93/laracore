@extends('update')

@section('content')
<div class="col-md-12">
    <p>{!! trans('installer.update.finish') !!}</p>
    @if(isset($error))
        @if($error instanceof \App\Exceptions\Laracore\LaracoreUpdateException)
        <p>An error occurred during the update process. A summary of the internal Laracore error is listed below.</p>
        <div class="alert alert-danger">
            {!! $error->getMessage() !!}
        </div>
        @else
        <p>An unknown error occurred.</p>
        <div class="alert alert-danger">
            {!! $error->getMessage() !!}
        </div>
        @endif
    @endif
</div>
@endsection