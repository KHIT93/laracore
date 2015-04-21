<div class="tab-pane fade in" id="tab-meta">
    <br>
    <div class="form-group @if ($errors->has('meta.title')) has-error @endif">
        {!! Form::label('meta[title]', 'Meta Title') !!}
        {!! Form::text('meta[title]', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group @if ($errors->has('meta.keywords')) has-error @endif">
        {!! Form::label('meta[keywords]', 'Meta Keywords') !!}
        {!! Form::text('meta[keywords]', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group @if ($errors->has('meta.description')) has-error @endif">
        {!! Form::label('meta[description]', 'Meta Description') !!}
        {!! Form::text('meta[description]', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group @if ($errors->has('meta.robots')) has-error @endif">
        {!! Form::label('meta[robots]', 'Search Engines') !!}
        {!! Form::select('meta[robots]', [
            'noindex,nofollow' => 'No indexing and no following',
            'index,nofollow' => 'Index, but do not follow',
            'noindex,follow' => 'Follow, but do not index',
            'index,follow' => 'Index and Follow',
        ],null, ['class' => 'form-control']) !!}
    </div>
</div>