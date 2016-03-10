@extends('admin')
@section('header_info')
    Permission Assignment
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">{!! FA::icon('lock') !!} Permission Assignment</h1>
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
            <li><a href="/admin/users/roles">Roles</a></li>
            <li class="active"><a href="/admin/users/permissions">Permissions</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active">
                <br>
                @if(count($permissions))
                {!! Form::open() !!}
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            @foreach($roles as $role)
                            <th>{{ $role->display_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->display_name }}<br>
                                <small>{{ $permission->description }}</small>
                            </td>
                            @foreach($roles as $role)
                            <td>
                                <div class="checkbox">
                                    <label>
                                        {!! Form::checkbox('permission['.$role->id.'][]', $permission->id, (($role->hasPermission($permission)) ? true : false)) !!}
                                    </label>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! Form::submit('Save assignments', ['class' => 'btn btn-raised btn-primary']) !!}
                {!! Form::close() !!}
                @else
                <p>There are currently no permissions on the website. If you see this message, please contact your system administrator right away as your website og webserver might have been compromised.</p>
                @endif
            </div>
        </div>
    </div>
</div>
<br/>
@stop