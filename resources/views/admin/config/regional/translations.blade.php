@extends('admin')
@section('header_info')
    Translation
@endsection

@section('header')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="page-header">Translation</h1>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
        <div class="col-sm-12">
            @include('flash::message')
            @include('errors._form_list')
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @if(count($translations))
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>String</th>
                    <th>Translation</th>
                    <th>Language</th>
                    <th>Last updated</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($translations as $translation)
                    <tr>
                        <td>{{ $translation->string }}</td>
                        <td>{{ $translation->translation }}</td>
                        <td>{{ $translation->locale }}</td>
                        <td>{{ $translation->updated_at->diffForHumans() }}</td>
                        <td>{!! Html::link('admin/config/regional/translate/'.$translation->id, 'Edit', ['class' => 'btn btn-default']) !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>It looks like you are either using English as your site language or that your translations store is empty</p>
            @endif
        </div>
    </div>
@stop