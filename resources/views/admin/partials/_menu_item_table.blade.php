<tr>
    <td>
        {!! Html::link($item->link, $item->name) !!}
    </td>
    <td>
        {!! Form::hidden('items['.$item->id.'][id]', $item->id) !!}
        {!! Form::select('items['.$item->id.'][position]', range(0, 100), $item->position, ['class' => 'form-control select2']) !!}
    </td>
    <td>
        {!! Form::checkbox('items['.$item->id.'][active]', 1, $item->active) !!}
    </td>
    <td>
        {!! Html::link('admin/menus/'.$menu->mid.'/'.$item->id.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
        {!! Html::link('admin/menus/'.$menu->mid.'/'.$item->id.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
    </td>
</tr>