<ul class="nav nav-tabs tabs-left">
@if(Request::path() == 'installer')
        <li class="active"><a>{{ trans('installer.welcome.header') }}</a></li>
        <li><a>{!! FA::icon('gavel') !!} {{ trans('installer.license.header') }}</a></li>
        <li><a>{!! FA::icon('check') !!} {{ trans('installer.requirements.header') }}</a> </li>
        <li><a>{!! FA::icon('database') !!} {{ trans('installer.database.header') }}</a></li>
        <li><a>{!! FA::icon('wrench') !!} {{ trans('installer.site.header') }}</a></li>
        <li><a>@if(Request::path() == 'installer/run') <i class="fa fa-circle-o-notch fa-spin"></i> @else {!! FA::icon('tasks') !!} @endif {{ trans('installer.install') }}</a></li>
        <li><a>{!! FA::icon('check-circle') !!} {{ trans('installer.done') }}</a></li>
@endif
@if(Request::path() == 'installer/license')
    <li class="disabled"><a>{{ trans('installer.welcome.header') }}</a></li>
    <li class="active"><a>{!! FA::icon('gavel') !!} {{ trans('installer.license.header') }}</a></li>
    <li><a>{!! FA::icon('check') !!} {{ trans('installer.requirements.header') }}</a> </li>
    <li><a>{!! FA::icon('database') !!} {{ trans('installer.database.header') }}</a></li>
    <li><a>{!! FA::icon('wrench') !!} {{ trans('installer.site.header') }}</a></li>
    <li><a>@if(Request::path() == 'installer/run') <i class="fa fa-circle-o-notch fa-spin"></i> @else {!! FA::icon('tasks') !!} @endif {{ trans('installer.install') }}</a></li>
    <li><a>{!! FA::icon('check-circle') !!} {{ trans('installer.done') }}</a></li>
@endif
@if(Request::path() == 'installer/requirements')
    <li class="disabled"><a>{{ trans('installer.welcome.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('gavel') !!} {{ trans('installer.license.header') }}</a></li>
    <li class="active"><a>{!! FA::icon('check') !!} {{ trans('installer.requirements.header') }}</a> </li>
    <li><a>{!! FA::icon('database') !!} {{ trans('installer.database.header') }}</a></li>
    <li><a>{!! FA::icon('wrench') !!} {{ trans('installer.site.header') }}</a></li>
    <li><a>@if(Request::path() == 'installer/run') <i class="fa fa-circle-o-notch fa-spin"></i> @else {!! FA::icon('tasks') !!} @endif {{ trans('installer.install') }}</a></li>
    <li><a>{!! FA::icon('check-circle') !!} {{ trans('installer.done') }}</a></li>
@endif
@if(Request::path() == 'installer/database')
    <li class="disabled"><a>{{ trans('installer.welcome.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('gavel') !!} {{ trans('installer.license.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('check') !!} {{ trans('installer.requirements.header') }}</a> </li>
    <li class="active"><a>{!! FA::icon('database') !!} {{ trans('installer.database.header') }}</a></li>
    <li><a>{!! FA::icon('wrench') !!} {{ trans('installer.site.header') }}</a></li>
    <li><a>@if(Request::path() == 'installer/run') <i class="fa fa-circle-o-notch fa-spin"></i> @else {!! FA::icon('tasks') !!} @endif {{ trans('installer.install') }}</a></li>
    <li><a>{!! FA::icon('check-circle') !!} {{ trans('installer.done') }}</a></li>
@endif
@if(Request::path() == 'installer/site')
    <li class="disabled"><a>{{ trans('installer.welcome.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('gavel') !!} {{ trans('installer.license.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('check') !!} {{ trans('installer.requirements.header') }}</a> </li>
    <li class="disabled"><a>{!! FA::icon('database') !!} {{ trans('installer.database.header') }}</a></li>
    <li class="active"><a>{!! FA::icon('wrench') !!} {{ trans('installer.site.header') }}</a></li>
    <li><a>@if(Request::path() == 'installer/run') <i class="fa fa-circle-o-notch fa-spin"></i> @else {!! FA::icon('tasks') !!} @endif {{ trans('installer.install') }}</a></li>
    <li><a>{!! FA::icon('check-circle') !!} {{ trans('installer.done') }}</a></li>
@endif
@if(Request::path() == 'installer/run')
    <li class="disabled"><a>{{ trans('installer.welcome.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('gavel') !!} {{ trans('installer.license.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('check') !!} {{ trans('installer.requirements.header') }}</a> </li>
    <li class="disabled"><a>{!! FA::icon('database') !!} {{ trans('installer.database.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('wrench') !!} {{ trans('installer.site.header') }}</a></li>
    <li class="active"><a>@if(Request::path() == 'installer/run') <i class="fa fa-circle-o-notch fa-spin"></i> @else {!! FA::icon('tasks') !!} @endif {{ trans('installer.install') }}</a></li>
    <li><a>{!! FA::icon('check-circle') !!} {{ trans('installer.done') }}</a></li>
@endif
@if(Request::path() == 'installer/finish')
    <li class="disabled"><a>{{ trans('installer.welcome.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('gavel') !!} {{ trans('installer.license.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('check') !!} {{ trans('installer.requirements.header') }}</a> </li>
    <li class="disabled"><a>{!! FA::icon('database') !!} {{ trans('installer.database.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('wrench') !!} {{ trans('installer.site.header') }}</a></li>
    <li class="disabled"><a>@if(Request::path() == 'installer/run') <i class="fa fa-circle-o-notch fa-spin"></i> @else {!! FA::icon('tasks') !!} @endif {{ trans('installer.install') }}</a></li>
    <li class="active"><a>{!! FA::icon('check-circle') !!} {{ trans('installer.done') }}</a></li>
@endif
@if(Request::path() == 'installer/fail')
    <li class="disabled"><a>{{ trans('installer.welcome.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('gavel') !!} {{ trans('installer.license.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('check') !!} {{ trans('installer.requirements.header') }}</a> </li>
    <li class="disabled"><a>{!! FA::icon('database') !!} {{ trans('installer.database.header') }}</a></li>
    <li class="disabled"><a>{!! FA::icon('wrench') !!} {{ trans('installer.site.header') }}</a></li>
    <li class="disabled"><a>@if(Request::path() == 'installer/run') <i class="fa fa-circle-o-notch fa-spin"></i> @else {!! FA::icon('tasks') !!} @endif {{ trans('installer.install') }}</a></li>
    <li class="active"><a>{!! FA::icon('times-circle') !!} {{ trans('installer.done') }}</a></li>
@endif
</ul>