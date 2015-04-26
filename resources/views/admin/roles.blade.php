@extends('admin')

@section('content')

<div class="col-sm-12">
    <h1>{!! FA::icon('users') !!} Role Management</h1>
</div>
<div class="col-sm-12">
    @include('flash::message')
    @include('errors._form_list')
</div>
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
                            {!! Html::link('admin/users/roles/'.$role->id.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
                            {!! Html::link('admin/users/roles/'.$role->id.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
                        </td>
                    </tr>
                    @endforeach
                    {!! Form::open() !!}
                    <tr>
                        <td>
                            {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Input new role name']) !!}
                            {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Type an optional role description']) !!}
                        </td>
                        <td>{!! Form::submit('Create', ['class' => 'btn btn-default']) !!}</td>
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

@stop