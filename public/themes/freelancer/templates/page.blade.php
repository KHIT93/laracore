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
                    <a class="name navbar-brand" href="{{ $site_home }}" title="{{ t('Home') }}">{{ $site_name }}</a>
                @endif
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                {!! $primary_nav !!}
                {!! $secondary_nav !!}
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="/themes/freelancer/img/profile.png" alt="">
                    <div class="intro-text">
                        <span class="name">{{ $site_name }}</span>
                        <hr class="star-light">
                        <span class="skills">CMS for web artisans - built by web artisans</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @if($page->sidebar_first)
        <aside class="col-sm-3" role="complementary">
            {!! $page->sidebar_first !!}
        </aside>  <!-- End first aside. -->
    @endif
    <!-- Main Section -->
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    {!! $page->title_prefix !!}
                    @if($page->title)
                        <h1 class="page-header">{{ $page->title }}</h1>
                    @endif
                    {!! $page->title_suffix !!}
                    <hr>
                </div>
            </div>
            <div class="row">
                @if($page->highlighted)
                    <div class="highlighted jumbotron">{!! $page->highlighted !!}</div>
                @endif
                {!! $breadcrumb !!}
                @include('flash::message')
                {!! $page->help !!}
                @section('content')
                    {!! $page->content !!}
                @show
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Freelancer</h3>
                        <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; {{ $site_name }} {{ date('Y') }}
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection