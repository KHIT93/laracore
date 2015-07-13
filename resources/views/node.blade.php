@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <h1>{{ $node->title }}</h1>
            @include('flash::message')
            <div class="row">
                <div class="col-sm-12">
                    {!! $node->body !!}
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
