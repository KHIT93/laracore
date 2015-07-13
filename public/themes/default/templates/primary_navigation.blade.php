<ul class="nav navbar-nav">
    @foreach($menu->items as $item)
        <li>
            {!! Html::link($item->link, $item->name) !!}
        </li>
    @endforeach
</ul>