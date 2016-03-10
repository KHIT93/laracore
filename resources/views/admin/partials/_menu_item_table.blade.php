<tr>
    <td class=" move-icon hidden-all">
        {!! FA::icon('arrows') !!}
    </td>
    <td>
        {!! Html::link($item->link, $item->name) !!}
    </td>
    <td>
        {!! Form::checkbox('items['.$item->id.'][active]', 1, $item->active) !!}
    </td>
    <td>
        {!! Form::hidden('items['.$item->id.'][id]', $item->id) !!}
        {!! Form::select('items['.$item->id.'][position]', range(0, 100), $item->position, ['class' => 'form-control sortable-position select2']) !!}
    </td>
    <td>
        {!! Html::link('admin/menus/'.$menu->mid.'/'.$item->id.'/edit', 'Edit', ['class' => 'btn btn-raised btn-primary']) !!}
        {!! Html::link('admin/menus/'.$menu->mid.'/'.$item->id.'/delete', 'Delete', ['class' => 'btn btn-raised btn-danger']) !!}
    </td>
</tr>