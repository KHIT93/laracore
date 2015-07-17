<div class="col-md-12">
    <h2>{{ trans('installer.database.header') }}</h2>
    <p>{{ trans('installer.database.intro') }}</p>
    @include('errors._form_list')
    <div class="radio">
        <label>
            <input type="radio" name="DB_DRIVER" value="mysql"> {{ trans('installer.database.mysql') }}
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="DB_DRIVER" value="sqlsrv"> {{ trans('installer.database.sqlsrv') }}
        </label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="DB_DRIVER" value="sqlite"> {{ trans('installer.database.sqlite') }}
        </label>
    </div>
    <div class="form-group @if ($errors->has('DB_DATABASE')) has-error @endif">
        {!! Form::label('DB_DATABASE', trans('installer.database.db_database')) !!}
        {!! Form::text('DB_DATABASE', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group @if ($errors->has('DB_USERNAME')) has-error @endif">
        {!! Form::label('DB_USERNAME', trans('installer.database.db_username')) !!}
        {!! Form::text('DB_USERNAME', null, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group @if ($errors->has('DB_PASSWORD')) has-error @endif">
        {!! Form::label('DB_PASSWORD', trans('installer.database.db_password')) !!}
        {!! Form::password('DB_PASSWORD', ['class' => 'form-control']) !!}
    </div>
    <fieldset>
        <legend>{{ trans('installer.adv_settings') }}</legend>
        <p>{{ trans('installer.database.adv_notes') }}</p>
        <div class="form-group @if ($errors->has('DB_HOST')) has-error @endif">
            {!! Form::label('DB_HOST', trans('installer.hostname')) !!}
            {!! Form::text('DB_HOST', 'localhost', ['class' => 'form-control', 'required']) !!}
        </div>
        <div class="form-group @if ($errors->has('DB_PORT')) has-error @endif">
            {!! Form::label('DB_PORT', trans('installer.port')) !!}
            {!! Form::text('DB_PORT', '3306', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group @if ($errors->has('DB_PREFIX')) has-error @endif">
            {!! Form::label('DB_PREFIX', trans('installer.database.db_prefix')) !!}
            {!! Form::text('DB_PREFIX', null, ['class' => 'form-control']) !!}
        </div>
    </fieldset>
    <button type="button" class="btn btn-info">{!! FA::icon('refresh') !!} {{ trans('installer.database.test') }}</button>
</div>