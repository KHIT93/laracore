@extends('admin')
@section('header_info')
    Configuration
@endsection

@section('header')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header"></h1>
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
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">General</div>
            <div class="list-group">
                <a href="/admin/config/system/site" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Site information</h4>
                    <p class="list-group-item-text">Change site name, email address, slogan, default front page, and error pages.</p>
                </a>
                <a href="/admin/config/system/maintenance" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Maintenance mode</h4>
                    <p class="list-group-item-text">Take the site offline for maintenance or bring it back online.</p>
                </a>
                <a href="/admin/config/system/caching" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Cache</h4>
                    <p class="list-group-item-text">Manage the caching settings for the website</p>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Content authoring</div>
            <div class="list-group">
                <a href="/admin/config/content" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> General</h4>
                    <p class="list-group-item-text">Configure general content authoring options, such as node revisions.</p>
                </a>
                <a href="/admin/config/text-formats" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Text formats and Wysiwyg</h4>
                    <p class="list-group-item-text">Configure how user-contributed content is filtered and formatted, as well as the text editor user interface (WYSIWYGs or toolbars).</p>
                </a>
                <a href="/admin/config/redirect" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> URL Redirects</h4>
                    <p class="list-group-item-text">Configure redirects and mappings between content and user friendly URL's</p>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">Regional and language</div>
            <div class="list-group">
                <a href="/admin/config/regional" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Regional settings</h4>
                    <p class="list-group-item-text">Settings for the default site language, timezone and country.</p>
                </a>
                <a href="/admin/config/regional/translate" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Translate user interface</h4>
                    <p class="list-group-item-text">Translate text in the UI, which is currently not localizaed.</p>
                </a>
            </div>
        </div>
    </div>
</div>

@stop