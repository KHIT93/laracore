<div class="col-md-12">
    <h2>{{ trans('installer.site.header') }}</h2>
    <p>{{ trans('installer.site.intro') }}</p>
    @include('errors._form_list')
    <fieldset>
        <legend>{{ trans('installer.site.info') }}</legend>
        <div class="form-group label-floating @if ($errors->has('site_name')) has-error @endif">
            {!! Form::label('site_name', trans('installer.site.name'), ['class' => 'control-label']) !!}
            {!! Form::text('site_name', Request::getHttpHost(), ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('site_email')) has-error @endif">
            {!! Form::label('site_email', trans('installer.site.email'), ['class' => 'control-label']) !!}
            {!! Form::text('site_email', null, ['class' => 'form-control', 'required']) !!}
            <small>{{ trans('installer.site.email_note') }}</small>
        </div>
    </fieldset>
    <fieldset>
        <legend>{{ trans('installer.site.admin.header') }}</legend>
        <div class="form-group label-floating @if ($errors->has('email')) has-error @endif">
            {!! Form::label('email', trans('installer.site.admin.email'), ['class' => 'control-label']) !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('name')) has-error @endif">
            {!! Form::label('name', trans('installer.site.admin.name'), ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('password')) has-error @endif">
            {!! Form::label('password', trans('installer.site.admin.password'), ['class' => 'control-label']) !!}
            {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('password_again')) has-error @endif">
            {!! Form::label('password_again', trans('installer.site.admin.password_again'), ['class' => 'control-label']) !!}
            {!! Form::password('password_again', ['class' => 'form-control', 'required']) !!}
        </div>
    </fieldset>
    <fieldset>
        <legend>Email settings</legend>
        <div class="form-group label-floating @if ($errors->has('MAIL_DRIVER')) has-error @endif">
            {!! Form::label('MAIL_DRIVER', trans('installer.site.email_cfg.driver'), ['class' => 'control-label']) !!}
                {!! Form::select('MAIL_DRIVER', $mail_drivers, config('mail.driver'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('MAIL_HOST')) has-error @endif">
            {!! Form::label('MAIL_HOST', trans('installer.hostname'), ['class' => 'control-label']) !!}
            {!! Form::text('MAIL_HOST', env('MAIL_HOST', null), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('MAIL_PORT')) has-error @endif">
            {!! Form::label('MAIL_PORT', trans('installer.port'), ['class' => 'control-label']) !!}
            {!! Form::text('MAIL_PORT', env('MAIL_PORT', null), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('MAIL_USERNAME')) has-error @endif">
            {!! Form::label('MAIL_USERNAME', trans('installer.username'), ['class' => 'control-label']) !!}
            {!! Form::text('MAIL_USERNAME', env('MAIL_USERNAME', null), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('MAIL_PASSWORD')) has-error @endif">
            {!! Form::label('MAIL_PASSWORD', trans('installer.password'), ['class' => 'control-label']) !!}
            {!! Form::password('MAIL_PASSWORD', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group label-floating @if ($errors->has('MAIL_ENCRYPTION')) has-error @endif">
            {!! Form::label('MAIL_ENCRYPTION', trans('installer.site.email_cfg.encryption'), ['class' => 'control-label']) !!}
            {!! Form::select('MAIL_ENCRYPTION', $mail_encryption, config('mail.encryption'), ['class' => 'form-control select2']) !!}
        </div>
    </fieldset>
    <fieldset>
        <legend>{{ trans('installer.regional.header') }}</legend>
        <div class="form-group select2-wrapper @if ($errors->has('APP_TIMEZONE')) has-error @endif">
            {!! Form::label('APP_TIMEZONE', trans('installer.site.timezone'), ['class' => 'control-label']) !!}
            {!! Form::select('APP_TIMEZONE', $timezones, date_default_timezone_get(), ['class' => 'form-control select2']) !!}
        </div>
        <div class="form-group @if ($errors->has('site_country')) has-error @endif">
            {!! Form::label('site_country', trans('installer.site.country'), ['class' => 'control-label']) !!}
            {!! Form::select('site_country', config('countries'), 'US', ['class' => 'form-control select2']) !!}
        </div>
    </fieldset>
</div>