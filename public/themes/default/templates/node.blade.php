@extends(Theme::template('page'))
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12">
                    {!! $node->body !!}
                </div>
            </div>
        </div>
    </div>
    @parent
@endsection