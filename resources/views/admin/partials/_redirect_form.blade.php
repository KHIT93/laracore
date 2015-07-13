{!! Form::open(['url' => 'admin/config/redirect/add']) !!}
<div class="form-group">
    {!! Form::label('alias', 'Path') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}