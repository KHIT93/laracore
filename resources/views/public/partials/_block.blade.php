<div class="block">
    @if(!is_null($block->title) && $block->title != '')
    <h2>{{ $block->title }}</h2>
    @endif
    {!! $block->content !!}
</div>