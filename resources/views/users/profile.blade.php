@extends(Theme::template('page'))

@section('content')
	<div class="row">
		<div class="col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <p>User was created <strong>{{ $user->created_at->diffForHumans() }}</strong></p>
            </div>
        </div>
		</div>
	</div>
@endsection
