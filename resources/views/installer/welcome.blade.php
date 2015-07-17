<div class="col-md-12">

    <h2>{{ trans('installer.welcome.header') }}</h2>
    <p>{{ trans('installer.welcome.intro') }}</p>
    @include('errors._form_list')
    <h3>{{ trans('installer.welcome.choose_lang') }}</h3>
    <p>{!! trans('installer.welcome.lang_note') !!}</p>
    <div class="form-group @if ($errors->has('site_country')) has-error @endif">
        {!! Form::select('langcode', config('languages'), 'en', ['class' => 'form-control']) !!}
    </div>
</div>