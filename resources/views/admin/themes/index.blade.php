@extends('admin')
@section('header_info')
    Appearance
@endsection
@section('content')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Appearance</h1>
        <p>
            Choose how your content will be displayed to your visitors by choosing one of the themes below.<br>
            If you do not want to use any of the themes that are installed from 3rd party sources you can always revert to the {!! Html::link('admin/themes/default', 'default theme') !!}.
        </p>
        <!-- <p>{!! Form::button('Add theme', ['class' => 'btn btn-default', 'data-toggle' => 'modal', 'data-target' => '#newThemeModal']) !!}</p> -->
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-12">
        @if(count($themes))
        @foreach($themes as $theme)
        <div class="row">
            <div class="col-md-6">
                @if(file_exists(base_path('public/themes/'.$theme['machine']).'/screenshot.png'))
                    <img src="{{ asset('themes/'.$theme['machine'].'/screenshot.png') }}" class="img-responsive" title="{{ $theme['description'] }}">
                @endif
                @if(file_exists(base_path('public/themes/'.$theme['machine']).'/screenshot.jpg'))
                    <img src="{{ asset('themes/'.$theme['machine'].'/screenshot.jpg') }}" class="img-responsive" title="{{ $theme['description'] }}">
                @endif
            </div>
            <div class="col-md-6">
                <h3>{{ $theme['name'] }}</h3>
                <p>{{ $theme['description'] }}</p>
                {!! Form::open(['url' => 'admin/themes/'.$theme['machine'], 'method' => 'POST']) !!}
                @if(Setting::get('site_theme') == $theme['machine'])
                    {!! Html::link('admin/themes/'.$theme['machine'], 'Current theme', ['class' => 'btn btn-success disabled']) !!}
                    {!! Form::submit('Current theme', ['class' => 'btn btn-success disabled', 'disabled' => 'disabled']) !!}
                @else
                    {!! Form::submit('Apply theme', ['class' => 'btn btn-info']) !!}
                @endif
                {!! Form::close() !!}

            </div>
        </div>
        <hr>
        @endforeach
        @else
        <p>There are currently no custom themes installed</p>
        @endif
    </div>
</div>
<div class="modal fade" id="newThemeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['url' => 'admin/themes/create']) !!}
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Create a new theme</h4>
            </div>
            <div class="modal-body">
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    {!! Form::label('name', 'Please provide a name for your new theme') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Create theme', ['class' => 'btn btn-primary']) !!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop