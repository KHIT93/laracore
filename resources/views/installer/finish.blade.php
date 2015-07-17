<div class="col-md-12">
    <h2 class="text-success">{{ trans('installer.finish.header') }}</h2>
    <p>{!! trans('installer.finish.info') !!}</p>
    <div class="row">
        <div class="col-xs-6 text-center">
            <a href="/admin" class="laravel-link">
                <i class="fa fa-lock fa-6x"></i><br>
                {{ trans('installer.admin') }}
            </a>
        </div>
        <div class="col-xs-6 text-center">
            <a href="/" class="laravel-link">
                <i class="fa fa-desktop fa-6x"></i><br>
                {{ trans('installer.frontend') }}
            </a>
        </div>
    </div>
</div>