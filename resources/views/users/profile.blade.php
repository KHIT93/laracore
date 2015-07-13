@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
                    <h1>{{ $user->name }}</h1>
                    @include('flash::message')
                    <div class="row">
                        <div class="col-sm-12">
                            <p>User was created <strong>{{ $user->created_at->diffForHumans() }}</strong></p>
                        </div>
                    </div>
		</div>
	</div>
</div>
@endsection
