<div class="section">
    @foreach($blocks as $block)
        {!! $block->render() !!}
    @endforeach
</div>