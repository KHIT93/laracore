@if(Request::path() == 'installer/license')
    <script src="{{ asset('/js/installer.license.js') }}"></script>
@endif
@if(Request::path() == 'installer/database')
    <script src="{{ asset('/js/installer.database.js') }}"></script>
@endif
@if(Request::path() == 'installer/site')
    <script src="{{ asset('/js/installer.site.js') }}"></script>
@endif
@if(Request::path() == 'installer/run')
    <script src="{{ asset('/js/installer.js') }}"></script>
@endif