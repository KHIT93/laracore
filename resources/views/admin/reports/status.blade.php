@extends('admin')
@section('header_info')
    Status report
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Status report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <tbody>
                <tr>
                    <td>{{ trans('installer.php_version') }}</td>
                    <td>{{ PHP_VERSION }}</td>
                </tr>
                <tr class="@if($php_version) bg-success @else bg-danger @endif">
                    <td colspan="2">
                        @if($php_version)
                            <span class="badge badge-success">
                        <i class="glyphicon glyphicon-ok"></i>
                    </span>
                            {{ trans('installer.requirements.match.php_version_match') }}
                        @else
                            <span class="badge badge-danger">
                        <i class="glyphicon glyphicon-remove"></i>
                    </span>
                            {{ trans('installer.requirements.mismatch.php_version_match') }}
                        @endif
                    </td>
                </tr>
                @foreach($requirements as $requirement => $passed)
                    @if($passed)
                        <tr class="bg-success">
                            <td>
                        <span class="badge badge-success">
                            <i class="glyphicon glyphicon-ok"></i>
                        </span>
                                PHP {{ ucfirst($requirement) }}
                            </td>
                            <td>
                                {{ trans('installer.requirements.match.'.$requirement) }}
                            </td>
                        </tr>
                    @else
                        <tr class="bg-danger">
                            <td>
                        <span class="badge badge-danger">
                            <i class="glyphicon glyphicon-remove"></i>
                        </span>
                                PHP {{ $requirement }}
                            </td>
                            <td>{{ trans('installer.requirements.mismatch.'.$requirement) }}</td>
                        </tr>
                    @endif
                @endforeach
                @foreach($storageperms as $perm)
                    @if($perm['isSet'])
                        <tr class="bg-success">
                            <td colspan="2">
                        <span class="badge badge-success">
                            {{ $perm['folder'] }}
                        </span>
                                {{ trans('installer.requirements.match.storageperm') }}
                            </td>
                        </tr>
                    @else
                        <tr class="bg-danger">
                            <td colspan="2">
                        <span class="badge badge-danger">
                            {{ $perm['folder'] }}
                        </span>
                                {{ trans('installer.requirements.mismatch.storageperm', ['permission' => $perm['permission']]) }}
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@stop