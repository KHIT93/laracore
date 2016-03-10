@extends('admin')
@section('header_info')
    Blocks
@endsection

@section('header')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">{!! FA::icon('list-alt') !!} Blocks</h1>
    </div>
</div>

@stop

@section('content')

<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="/admin/blocks">Block placement</a></li>
            <li><a href="/admin/blocks/custom">Custom blocks</a></li>
        </ul><br>
        <p>Block placement is specific to each theme on your site. Changes will not be saved until you click Save blocks at the bottom of the page.</p>
        @if(count($blocks))
        {!! Form::open() !!}
            <table class="table table-striped table-sortable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Section</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Theme::sections() as $key => $section)
                        <tr>
                            <td colspan="4" class="bg-info"><strong>{{ $section }}</strong></td>
                        </tr>
                        @include('admin.blocks.partials._blocks', ['content' => $blocks[$key]])
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                {!! Form::submit('Save blocks', ['class' => 'btn btn-raised btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        @else
        <p>There are no blocks created. Something must be wrong with your installation.</p>
        @endif
    </div>
</div>

@stop
