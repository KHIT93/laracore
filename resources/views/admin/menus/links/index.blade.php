@extends('admin')
@section('header_info')
    Edit menu: {{ $menu->name }}
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Edit menu: <em>{{ $menu->name }}</em></h1>
        <p><a href="{{ url('admin/menus/'.$menu->mid.'/links/add') }}" class="btn btn-default">{!! FA::icon('plus') !!} Create</a></p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if(count($menu->items()))
        {!! Form::open() !!}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Enabled</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menu->items()->getResults() as $item)
                    @include('admin.partials._menu_item_table', $item)
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        @else
        <p>There are no links in this menu. Do you want to {!! Html::link('admin/menus/'.$menu->mid.'/links/add', 'create') !!} some?</p>
        @endif
    </div>
</div>

@stop