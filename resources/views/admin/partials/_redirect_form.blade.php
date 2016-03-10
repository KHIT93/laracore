{!! Form::open(['url' => 'admin/config/redirect/add']) !!}
<div class="form-group">
    {!! Form::label('alias', 'Path') !!}
    {!! Form::text('alias', null, ['class' => 'form-control']) !!}
</div>
<input type="hidden" name="source" value="{{ $source }}">
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-raised btn-primary']) !!}
</div>
{!! Form::close() !!}