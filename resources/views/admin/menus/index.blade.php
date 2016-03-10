@extends('admin')
@section('header_info')
    Menus
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">{!! FA::icon('bars') !!} Menus</h1>
        <p><a href="{{ url('admin/menus/add') }}" class="btn btn-raised btn-default">{!! FA::icon('plus') !!} Create</a></p>
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
                        {!! Html::link('admin/menus/'.$menu->mid.'/links', 'View links', ['class' => 'btn btn-raised btn-default']) !!}
                        {!! Html::link('admin/menus/'.$menu->mid.'/edit', 'Edit', ['class' => 'btn btn-raised btn-primary']) !!}
                        {!! Html::link('admin/menus/'.$menu->mid.'/delete', 'Delete', ['class' => 'btn btn-raised btn-danger']) !!}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>There are no menus created. Something must be wrong with your installation.</p>
        @endif
    </div>
</div>

@stop