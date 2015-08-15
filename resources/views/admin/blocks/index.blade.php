@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">{!! FA::icon('list-alt') !!} Blocks</h1>
        <p><a href="{{ url('admin/blocks/add') }}" class="btn btn-default">Create</a></p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if(count($blocks))
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Theme::sections() as $key => $section)
                    <tr>
                        <td colspan="3" class="bg-info">{{ $section }}</td>
                    </tr>
                    @include('admin.blocks.partials._blocks', ['content' => $blocks[$key]])
                @endforeach
            </tbody>
        </table>
        @else
        <p>There are no blocks created. Something must be wrong with your installation.</p>
        @endif
    </div>
</div>

@stop