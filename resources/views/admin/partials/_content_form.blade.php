<div class="form-group label-floating @if ($errors->has('content.title')) has-error @endif">
    {!! Form::label('content[title]', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('content[title]', $node->title, ['class' => 'form-control', 'required']) !!}
</div>
<div class="form-group @if ($errors->has('content.body')) has-error @endif">
    {!! Form::label('content[body]', 'Body') !!}
    {!! Form::textarea('content[body]', $node->body, ['class' => 'form-control ckeditor', 'required']) !!}
</div>
<div class="form-group">
    <div class="checkbox">
        <label>
            {!! Form::checkbox('content[published]', 1, true) !!}
            Published
        </label>
    </div>
</div>