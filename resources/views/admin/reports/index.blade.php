@extends('admin')
@section('header_info')
    Reports
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Reports</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="list-group">
                <a href="/admin/reports/status" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Status report</h4>
                    <p class="list-group-item-text">The status report will give you an overview of any issues with your website</p>
                </a>
                <a href="/admin/reports/log" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Latest log entries</h4>
                    <p class="list-group-item-text">View the latest entries to the application log</p>
                </a>
                <a href="/admin/reports/updates" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Updates</h4>
                    <p class="list-group-item-text">The update report will show a list of available updates for your installed version of Laracore and any modules and themes that might be installed.</p>
                </a>
                <a href="/admin/reports/page-not-found" class="list-group-item">
                    <h4 class="list-group-item-heading"><i class="fa fa-arrow-circle-right"></i> Recent 'Page Not Found' errors</h4>
                    <p class="list-group-item-text">View a report of which 404 'Page Not Found' errors are happening on your website</p>
                </a>
            </div>
        </div>
    </div>

@stop