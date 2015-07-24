@extends('update')

@section('content')
    <div class="col-md-12">
        <h2>{{ trans('installer.welcome.header') }}</h2>
        <p>{!! trans('installer.update.intro') !!}</p>
        @include('errors._form_list')
        <p>{!! trans('installer.update.steps') !!}</p>
    </div>
@endsection