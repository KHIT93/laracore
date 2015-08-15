@if(count($content))
    @foreach($content as $block)
        <tr>
            <td>
                {{ $block->description }}
            </td>
            <td>{{ Theme::sections()[$block->section] }}</td>
            <td>
                {!! Html::link('admin/blocks/'.$block->bid.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
                {!! Html::link('admin/blocks/'.$block->bid.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="3"><em>There are no blocks in this section</em></td>
    </tr>
@endif