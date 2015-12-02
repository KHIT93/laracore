@extends('admin')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">{!! FA::icon('files-o') !!} Modules</h1>
        <p><a href="{{ url('admin/modules/add') }}" class="btn btn-default">{!! FA::icon('plus') !!} Add</a></p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if(count($modules))
        {!! Form::open() !!}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($modules as $module)
                    <tr>
                        <td>{!! Form::checkbox('modules['.$module['slug'].'][enabled]', true, Module::isEnabled($module['slug'])) !!}</td>
                        <td>{{ $module['name'] }}<br><small>({{ $module['slug'] }})</small></td>
                        <td>{{ $module['description'] }}<br><small>Version: {{ $module['version'] }}</small></td>
                        <td>
                            @if(Module::isEnabled($module['slug']))
                                {!! Html::link('admin/modules/'.$module['slug'].'/disable', 'Disable', ['class' => 'btn btn-danger']) !!}
                            @else
                                {!! Html::link('admin/modules/'.$module['slug'].'/enable', 'Enable', ['class' => 'btn btn-primary']) !!}
                            @endif
                        </td>
                    </tr>
                    {!! Form::hidden('modules['.$module['slug'].'][slug]', $module['slug']) !!}
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        @else
        <p>There are currently no modules installed. Why not {!! Html::link('admin/modules/add', 'install') !!} some modules?</p>
        @endif
    </div>
</div>
@stop