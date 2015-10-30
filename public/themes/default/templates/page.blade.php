@extends(Theme::template('master'))

@section('header_info')
<title>{!! $title !!}</title>
    {!! $metadata !!}
@stop

@section('page')
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    @if($logo)
                        <a class="logo navbar-btn pull-left" href="{{ $site_home }}" title="{{ t('Home') }}">
                            <img src="{{ $logo }}" alt="{{ t('Home') }}" />
                        </a>
                    @endif

                    @if($site_name)
                        <a class="name navbar-brand" href="{{ $site_home }}" title="{{ t('Home') }}">{{ $site_name }}</a>
                        @endif

                                <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                </div>


                <div class="navbar-collapse collapse">
                    {!! $primary_nav !!}
                    {!! $secondary_nav !!}
                </div>
            </div>
        </nav>
        <div class="main-container container-fluid">

            <header role="banner" id="page-header">
                @if($site_slogan)
                    <p class="lead">{{ $site_slogan }}</p>
                @endif

                {!! $page->header !!}
            </header> <!-- /#page-header -->

            <div class="row">
                @if($page->sidebar_first)
                    <aside class="col-sm-3" role="complementary">
                        {!! $page->sidebar_first !!}
                    </aside>  <!-- End first aside. -->
                @endif
                <section class="@if($page->sidebar_first && $page->sidebar_second) col-md-6 @elseif(($page->sidebar_first && !$page->sidebar_second) || (!$page->sidebar_first && $page->sidebar_second)) col-md-9 @else col-md-12" @endif>
                    @if($page->highlighted)
                        <div class="highlighted jumbotron">{!! $page->highlighted !!}</div>
                    @endif
                    {!! $breadcrumb !!}
                    <a id="main-content"></a>
                    {!! $page->title_prefix !!}
                    @if($page->title)
                        <h1 class="page-header">{{ $page->title }}</h1>
                    @endif
                    {!! $page->title_suffix !!}
                    @include('flash::message')
                    {!! $page->help !!}
                    @section('content')
                    {!! $page->content !!}
                    @show
                </section>

                @if($page->sidebar_second)
                    <aside class="col-sm-3" role="complementary">
                        {!! $page->sidebar_second !!}
                    </aside> <!-- End second aside. -->
                @endif

            </div>
        </div>
    </div>

    @if($page->footer)
    <footer class="footer container" role="contentinfo">
        {!! $page->footer !!}
    </footer>
    @endif
@endsection