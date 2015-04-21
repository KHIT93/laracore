@extends('admin')

@section('content')
<div class="col-sm-12">
    <h1>{!! FA::icon('bars') !!} Menus</h1>
    <p><a href="{{ url('admin/menus/add') }}" class="btn btn-default">Create</a></p>
</div>
<div class="col-sm-12">
    @include('flash::message')
</div>
<div class="col-sm-12">
    @if(count($menus))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $menu)
            <tr>
                <td>
                    {{ $menu->name }}<br>
                    <small>{{ $menu->description }}</small>
                </td>
                <td>
                    {!! Html::link('admin/menus/'.$menu->mid.'/links', 'View links', ['class' => 'btn btn-default']) !!}
                    {!! Html::link('admin/menus/'.$menu->mid.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
                    {!! Html::link('admin/menus/'.$menu->mid.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>There are no menus created. Something must be wrong with your installation.</p>
    @endif
</div>

@stop