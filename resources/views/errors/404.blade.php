@extends(Theme::template('page'))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
            @include('flash::message')
            <div class="row">
                <div class="col-sm-12">
                    The requested page "<i>/{{ Request::path() }}</i>" was not found
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
