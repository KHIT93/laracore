@extends(Theme::template('master'))

@section('header_info')
<title>{!! $title !!}</title>
    {!! $metadata !!}
@stop

@section('page')
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if($site_name)
                    <a class="name navbar-brand page-scroll" href="{{ $site_home }}" title="{{ t('Home') }}">{{ $site_name }}</a>
                @endif
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                {!! $primary_nav !!}
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Studio!</div>
                <div class="intro-heading">It's Nice To Meet You</div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
            </div>
        </div>
    </header>
    <!-- Services Section -->
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    {!! $page->title_prefix !!}
                    @if($page->title)
                        <h1 class="page-header">{{ $page->title }}</h1>
                    @endif
                    {!! $page->title_suffix !!}
                </div>
            </div>
            <div class="row">
                @if($page->sidebar_first)
                    <aside class="col-sm-3" role="complementary">
                        {!! $page->sidebar_first !!}
                    </aside>  <!-- End first aside. -->
                @endif
                <section>
                    @if($page->highlighted)
                        <div class="highlighted jumbotron">{!! $page->highlighted !!}</div>
                    @endif
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
    </section>
@if($page->footer)
    <footer class="footer container" role="contentinfo">
        {!! $page->footer !!}
    </footer>
@endif
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; {{ $site_name }} {{ date('Y') }}</span>
                </div>
            </div>
        </div>
    </footer>
@endsection