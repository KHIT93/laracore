<div class="col-md-12">
    <h2>{{ trans('installer.requirements.header') }}</h2>
    <p>{!! trans('installer.requirements.info') !!}</p>
    <table class="table">
        <tbody>
            <tr>
                <td>{{ trans('installer.php_version') }}</td>
                <td>{{ PHP_VERSION }}</td>
            </tr>
        @if(isset($validation['errors']))
        @foreach($validation['errors'] as $error)
            <tr class="bg-danger">
                <td colspan="2">{{ $error }}</td>
            </tr>
        @endforeach
        @endif
        @if(isset($validation['success']))
        @foreach($validation['success'] as $message)
            <tr class="bg-success">
                <td colspan="2">{{ $message }}</td>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    <a href="/installer/requirements" class="btn btn-info">{!! FA::icon('refresh') !!} {{ trans('installer.check_again') }}</a>
</div>