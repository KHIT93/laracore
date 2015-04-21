@extends('admin')

@section('content')

<div class="col-sm-12">
    <h1>Overview</h1>
</div>
<div class="col-sm-12">
    @include('flash::message')
</div>
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="fa fa-pencil fa-5x"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class="huge">2</div>
                    <div>Nodes</div>
                    </div>
                </div>
            </div>
            <a href="/admin/content">
            <div class="panel-footer">
                <span class="pull-left">Manage your content</span>
                <span class="pull-right fa fa-arrow-circle-right"></span>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="fa fa-user fa-5x"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class="huge">5</div>
                    <div>Users</div>
                    </div>
                </div>
            </div>
            <a href="/admin/users">
            <div class="panel-footer">
                <span class="pull-left">Manage users</span>
                <span class="pull-right fa fa-arrow-circle-right"></span>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="fa fa-download fa-5x"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class="huge">4</div>
                    <div>Updates</div>
                    </div>
                </div>
            </div>
            <a href="/admin/config/updates">
            <div class="panel-footer">
                <span class="pull-left">Install now!</span>
                <span class="pull-right fa fa-arrow-circle-right"></span>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <span class="fa fa-exclamation-circle fa-5x"></span>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class="huge">10</div>
                    <div>New issues</div>
                    </div>
                </div>
            </div>
            <a href="/admin/reports/404-errors">
            <div class="panel-footer">
                <span class="pull-left">Review issues</span>
                <span class="pull-right fa fa-arrow-circle-right"></span>
                <div class="clearfix"></div>
            </div>
            </a>
        </div>
    </div>
</div>

@stop