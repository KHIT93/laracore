<div class="col-md-12">
    <h2>{{ trans('installer.requirements.header') }}</h2>
    <p>{!! trans('installer.requirements.info') !!}</p>
    <table class="table">
        <tbody>
            <tr>
                <td colspan="2"><h3>Server requirements</h3></td>
            </tr>
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
                </td>
            </tr>
            <tr>
                <td colspan="2"><h3>Storage Permissions</h3></td>
            </tr>
        @foreach($requirements as $requirement => $passed)
            @if($passed)
                <tr class="bg-success">
                    <td>
                        <span class="badge badge-success">
                            <i class="glyphicon glyphicon-ok"></i>
                        </span>
                        PHP {{ $requirement }}
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
        @foreach($storageperms as $perm => $passed)
            @if($passed)
                <tr class="bg-success">
                    <td colspan="2">
                        <span class="badge badge-success">
                            <i class="glyphicon glyphicon-ok"></i>
                        </span>
                        {{ trans('installer.requirements.match.storageperm', ['path' => $perm]) }}
                    </td>
                </tr>
            @else
                <tr class="bg-danger">
                    <td colspan="2">
                        <span class="badge badge-danger">
                            <i class="glyphicon glyphicon-remove"></i>
                        </span>
                        {{ trans('installer.requirements.mismatch.storageperm', ['path' => $perm]) }}
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    <a href="/installer/requirements" class="btn btn-info">{!! FA::icon('refresh') !!} {{ trans('installer.check_again') }}</a>
</div>