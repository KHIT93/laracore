<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id='side-menu'>
            <li @if(Request::is('admin/dashboard') || Request::is('admin')) class="active" @endif><a href="/admin/dashboard"><i class="fa fa-tachometer fa-fw"></i> Overview <span class="sr-only">(current)</span></a></li>
            <li @if(Request::is('admin/content')) class="active" @endif><a href="/admin/content"><i class="fa fa-file-o fa-fw"></i> Content</a></li>
            <li @if(Request::is('admin/layout')) class="active" @endif>
                <a href="/admin/layout">
                    <i class="fa fa-desktop fa-fw"></i> Layout <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li @if(Request::is('admin/menus')) class="active" @endif><a href="/admin/menus"><i class="fa fa-bars fa-fw"></i> Menus</a></li>
                    <li @if(Request::is('admin/blocks')) class="active" @endif><a href="/admin/blocks"><i class="fa fa-list-alt fa-fw"></i> Blocks</a></li>
                </ul>
            </li>
            <li @if(Request::is('admin/themes')) class="active" @endif><a href="/admin/themes"><i class="fa fa-paint-brush fa-fw"></i> Appearance</a></li>
            <li @if(Request::is('admin/modules')) class="active" @endif><a href="/admin/modules"><i class="fa fa-puzzle-piece fa-fw"></i> Modules</a></li>
            <li @if(Request::is('admin/users') || Request::is('admin/users/*')) class="active" @endif><a href="/admin/users"><i class="fa fa-user fa-fw"></i> Users</a></li>
            <li @if(Request::is('admin/config') || Request::is('admin/config/*')) class="active" @endif><a href="/admin/config"><i class="fa fa-cog fa-fw"></i> Configuration</a></li>
            <li @if(Request::is('admin/reports') || Request::is('admin/reports/*')) class="active" @endif><a href="/admin/reports"><i class="fa fa-book fa-fw"></i> Reports</a></li>
        </ul>
    </div>
</div>