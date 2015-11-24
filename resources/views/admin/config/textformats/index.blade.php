@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Text formatting and filtering</h1>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <p>Below is a list of all the text formats that have been created for this website.<br>
            Feel free to modify any of them to your liking or create your own custom text formats and filters.<br>
            Please note that the default formats have limited options for modifications.<br>
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(count($text_filters))
                @foreach($text_filters as $filter)
                    <tr>
                        <td>
                            {{ $filter->name }}<br>
                            <small><em>{{ $filter->description }}</em></small>
                        </td>
                        <td>
                            @if($filter->type == \App\Libraries\StrFilter::RESTRICTED_HTML){!! Html::link('admin/config/text-formats/'.$filter->id, 'Edit', ['class' => 'btn btn-default']) !!}@endif
                            {!! Html::link('admin/config/text-formats/'.$filter->id.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
                        </td>
                    </tr>
                @endforeach
                @else
                    <p>There seems to be a problem with the installation as no text filters are installed</p>
                @endif
            </tbody>
        </table>
    </div>
</div>
@stop