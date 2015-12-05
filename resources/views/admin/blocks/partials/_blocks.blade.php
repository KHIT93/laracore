@if(count($content))
    @foreach($content as $block)
        <tr>
            <td>
                {!! Form::hidden('blocks['.$block->bid.'][bid]', $block->bid) !!}
                {{ $block->description }}
            </td>
            <td>{!! Form::select('blocks['.$block->bid.'][section]', Theme::sections(), (($block->section) ? $block->section : 0), ['class' => 'form-control select2']) !!}</td>
            <td>{!! Form::select('blocks['.$block->bid.'][position]', range(0, 15), $block->position, ['class' => 'form-control select2-basic']) !!}</td>
            <td>
                {!! Html::link('admin/blocks/'.$block->bid.'/edit', 'Edit', ['class' => 'btn btn-primary']) !!}
                {!! Html::link('admin/blocks/'.$block->bid.'/delete', 'Delete', ['class' => 'btn btn-danger']) !!}
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4"><em>There are no blocks in this section</em></td>
    </tr>
@endif