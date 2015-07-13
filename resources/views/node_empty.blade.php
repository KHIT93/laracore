@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
            <h1>No content available</h1>
            @include('flash::message')
            <div class="row">
                <div class="col-sm-12">
                    <p>There is currently no content available for display. Please log in and {!! Html::link('admin/content', 'Create some content') !!}</p>
                </div>
            </div>
		</div>
	</div>
</div>
@endsection
