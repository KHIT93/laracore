@extends('admin')

@section('content')

<div class="col-sm-12">
    @include('flash::message')
</div>
<div class="col-sm-12">
    <div class="list-group">
        <a href="/admin/menus" class="list-group-item">
            <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Menus</h4>
            <p class="list-group-item-text">Manage the menus used on the website</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Blocks</h4>
            <p class="list-group-item-text">Manage blocks and widgets</p>
        </a>
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Themes</h4>
            <p class="list-group-item-text">Choose the theme and general layout of the website</p>
        </a>
    </div>
</div>

@stop