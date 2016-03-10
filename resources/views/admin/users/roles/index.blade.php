@extends('admin')
@section('header_info')
    Role Management
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">{!! FA::icon('shield') !!} Role Management</h1>
    </div>
</div>

@stop

@section('content')

<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
        @include('errors._form_list')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="/admin/users">Users</a></li>
            <li class="active"><a href="/admin/users/roles">Roles</a></li>
            <li><a href="/admin/users/permissions">Permissions</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active">
                <br>
                @if(count($roles))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>
                                <span data-toggle="tooltip" data-placement="right" title="{{ $role->description }}">{{ $role->display_name }}</span>
                            </td>
                            <td>
                                {!! Html::link('admin/users/roles/'.$role->id.'/edit', 'Edit', ['class' => 'btn btn-raised btn-primary']) !!}
                                {!! Html::link('admin/users/roles/'.$role->id.'/delete', 'Delete', ['class' => 'btn btn-raised btn-danger']) !!}
                            </td>
                        </tr>
                        @endforeach
                        {!! Form::open() !!}
                        <tr>
                            <td>
                                <div class="form-group label-floating">
                                    {!! Form::label('display_name', 'Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('display_name', null, ['class' => 'form-control']) !!}
                                    <p class="help-block">Input new role name</p>
                                </div>
                                <div class="form-group label-floating">
                                    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                                    <p class="help-block">Type an optional role description</p>
                                </div>
                            </td>
                            <td>{!! Form::submit('Create', ['class' => 'btn btn-raised btn-default']) !!}</td>
                        </tr>
                        {!! Form::close() !!}
                    </tbody>
                </table>
                @else
                <p>There are currently no roles on the website. If you see this message, please contact your system administrator right away as your website og webserver might have been compromised.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@stop