@extends('admin')

@section('content')

<div class="col-sm-12">
    <h1>{!! FA::icon('users') !!} User Management</h1>
</div>
<div class="col-sm-12">
    @include('flash::message')
</div>
<div class="col-sm-12">
    <ul class="nav nav-tabs">
        <li class="active"><a href="/admin/users">Users</a></li>
        <li><a href="/admin/users/roles">Roles</a></li>
        <li><a href="/admin/users/permissions">Permissions</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active">
            <br>
            <p><a href="{{ url('admin/users/add') }}" class="btn btn-default">Create</a></p>
            @if(count($users))
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Last updated</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{!! Html::link('user/'.$user->uid, $user->name) !!}</td>
                        <td>{!! $user->role()->first()->name !!}</td>
                        <td>{{ ($user->enabled == 1) ? 'Enabled' : 'Disabled' }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                        <td>
                            {!! Html::link('user/'.$user->uid, 'View', ['class' => 'btn btn-default']) !!}
                            {!! Html::link('admin/users/'.$user->uid.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
                            {!! Html::link('admin/users/'.$user->uid.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>There are currently no users on the website. If you see this message, please contact your system administrator right away as your website og webserver might have been compromised.</p>
            @endif
        </div>
    </div>
    
</div>

@stop