@extends('admin')
@section('header_info')
    Edit menu: {{ $menu->name }}
@endsection

@section('header')

<div class="row">
    <div class="col-sm-12">
        <h1 class="page-header">Edit menu: <em>{{ $menu->name }}</em></h1>
        <p><a href="{{ url('admin/menus/'.$menu->mid.'/links/add') }}" class="btn btn-raised btn-default">{!! FA::icon('plus') !!} Create</a></p>
    </div>
</div>

@stop

@section('content')

<div class="row">
    <div class="col-sm-12">
        @include('flash::message')
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if(count($menu->items()))
        {!! Form::open() !!}
            <a class="sortable-display-toggle pull-right" onclick="togglePositionInputDisplay()">Toggle display</a>
            <table class="table table-striped table-sortable">
                <thead>
                    <tr>
                        <th id="table-menu-item-move-icon" class="hidden-all"></th>
                        <th id="table-menu-item-name">Name</th>
                        <th id="table-menu-item-enable">Enabled</th>
                        <th id="table-menu-item-position">Position</th>
                        <th id="table-menu-item-actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menu->items()->orderBy('position')->getResults() as $item)
                    @include('admin.partials._menu_item_table', $item)
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-raised btn-primary']) !!}
            </div>
        {!! Form::close() !!}
        @else
        <p>There are no links in this menu. Do you want to {!! Html::link('admin/menus/'.$menu->mid.'/links/add', 'create') !!} some?</p>
        @endif
    </div>
</div>

@stop

@section('bottom-scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Hide input fields for position
            togglePositionInputDisplay();
            //Helper function to keep table row from collapsing when being sorted
            var fixHelperModified = function(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index)
                {
                    $(this).width($originals.eq(index).width())
                });
                return $helper;
            };

            //Make diagnosis table sortable
            $(".table-sortable tbody").sortable({
                helper: fixHelperModified,
                stop: function(event,ui) {renumber_table('.table-sortable')}
            }).disableSelection();
        });

        //Renumber table rows
        function renumber_table(tableID) {
            $(tableID + " tr").each(function() {
                count = $(this).parent().children().index($(this)) + 1;
                $(this).find('.select2').select2('val', count);
                $(this).find('.priority').html(count);
            });
        }
        function togglePositionInputDisplay()
        {
            if($("th#table-menu-item-position").hasClass('hidden-all'))
            {
                $("th#table-menu-item-position").removeClass('hidden-all');
            }
            else
            {
                $("th#table-menu-item-position").addClass('hidden-all');
            }

            $("select.sortable-position").each(function(){
                if($(this.parentNode).hasClass('hidden-all'))
                {
                    $(this.parentNode).removeClass('hidden-all');
                }
                else
                {
                    $(this.parentNode).addClass('hidden-all');
                }
            });
            if($("th#table-menu-item-move-icon").hasClass('hidden-all'))
            {
                $("th#table-menu-item-move-icon").removeClass('hidden-all');
            }
            else
            {
                $("th#table-menu-item-move-icon").addClass('hidden-all');
            }
            if($("td.move-icon").hasClass('hidden-all'))
            {
                $("td.move-icon").removeClass('hidden-all');
            }
            else
            {
                $("td.move-icon").addClass('hidden-all');
            }
        }
    </script>
@stop