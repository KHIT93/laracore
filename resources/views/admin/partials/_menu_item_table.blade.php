<tr>
    <td>
        {!! Html::link($item->link, $item->name) !!}
    </td>
    <td>
        {!! Html::link('admin/menus/'.$menu->mid.'/'.$item->id.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
        {!! Html::link('admin/menus/'.$menu->mid.'/'.$item->id.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
    </td>
</tr>