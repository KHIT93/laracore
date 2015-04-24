<!-- <ul class="nav nav-sidebar">
    <li @if(Request::is('admin/dashboard') || Request::is('admin')) class="active" @endif><a href="/admin/dashboard"><i class="fa fa-tachometer"></i> Overview <span class="sr-only">(current)</span></a></li>
    <li @if(Request::is('admin/content')) class="active" @endif><a href="/admin/content"><i class="fa fa-file-o"></i> Content</a></li>
    <li @if(Request::is('admin/layout')) class="active" @endif>
        <a class="dropdown-toggle" data-toggle="dropdown" href="/admin/layout" role="button" aria-expanded="false">
            <i class="fa fa-desktop"></i> Layout <span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li @if(Request::is('admin/menus')) class="active" @endif><a href="/admin/menus"><i class="fa fa-bars"></i> Menus</a></li>
            <li @if(Request::is('admin/blocks')) class="active" @endif><a href="/admin/blocks"><i class="fa fa-list-alt"></i> Blocks</a></li>
        </ul>
    </li>
    <li @if(Request::is('admin/themes')) class="active" @endif><a href="/admin/themes"><i class="fa fa-paint-brush"></i> Appearance</a></li>
    <li @if(Request::is('admin/modules')) class="active" @endif><a href="/admin/modules"><i class="fa fa-puzzle-piece"></i> Modules</a></li>
    <li @if(Request::is('admin/users') || Request::is('admin/users/*')) class="active" @endif><a href="/admin/users"><i class="fa fa-user"></i> Users</a></li>
    <li @if(Request::is('admin/config') || Request::is('admin/config/*')) class="active" @endif><a href="/admin/config"><i class="fa fa-cog"></i> Configuration</a></li>
    <li @if(Request::is('admin/reports') || Request::is('admin/reports/*')) class="active" @endif><a href="/admin/reports"><i class="fa fa-book"></i> Reports</a></li>
</ul> -->
@if(count($items))
<ul class="nav nav-sidebar">
    @foreach ($items as $item)
    <li @if(Request::is($item->link)) class="active" @endif>
        <a href="{{ url($item->link) }}">{!! FA::icon($item->icon) !!} {{ $item->name }}</a>
        @if(count($item->childs))
        <ul class="dropdown-menu" role="menu">
            @foreach($item->childs as $child)
            <li @if(Request::is($child->link)) class="active" @endif>
                <a href="{{ url($child->link) }}">{!! FA::icon($child->icon) !!} {{ $child->name }}</a>
            </li>
            @endforeach
        </ul>
        @endif
    </li>
    @endforeach
</ul>
@endif