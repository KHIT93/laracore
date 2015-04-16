@extends('app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Edit <em>{{ $node->title }}</em></h1>
        </div>
        <div class="col-sm-12">
            {!! Form::open() !!}
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab-main" data-target="#tab-main" data-toggle="tab" aria-expanded="true">Content</a></li>
                <li><a href="#tab-meta" data-target="#tab-meta" data-toggle="tab" aria-expanded="false">Metadata</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-main">
                    <br>
                    <div class="form-group">
                        {!! Form::label('content[title]', 'Title') !!}
                        {!! Form::text('content[title]', $node->title, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('content[body]', 'Body') !!}
                        {!! Form::textarea('content[body]', $node->body, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                {!! Form::checkbox('content[published]', 1, true) !!}
                                Published
                            </label>
                        </div>
                    </div>
                    @if(count($urls))
                    <fieldset>
                        <legend>URL</legend>
                        <table class="table table-striped">
                            <tbody>
                                @foreach($urls as $url)
                                <tr>
                                    <td>{{ $url->alias }}</td>
                                    <td>{!! Html::link('admin/config/redirects/'.$url->alias.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </fieldset>
                    @endif
                </div>
                <div class="tab-pane fade in" id="tab-meta">
                    <br>
                    <div class="form-group">
                        {!! Form::label('meta[title]', 'Meta Title') !!}
                        {!! Form::text('meta[title]', $meta->title, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta[keywords]', 'Meta Keywords') !!}
                        {!! Form::text('meta[keywords]', $meta->keywords, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta[description]', 'Meta Description') !!}
                        {!! Form::text('meta[description]', $meta->description, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('meta[description]', 'Search Engines') !!}
                        {!! Form::select('meta[robots]', [
                            'noindex,nofollow' => 'No indexing and no following',
                            'index,nofollow' => 'Index, but do not follow',
                            'noindex,follow' => 'Follow, but do not index',
                            'index,follow' => 'Index and Follow',
                        ],$meta->robots, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                {!! Html::link('admin/content', 'Cancel', ['class' => 'btn btn-default']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>

@stop