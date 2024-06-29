@if (count($listmenu) == 0)
    <li><a href="{{ $menu_item->link }}">{{ $menu_item->name }}</a></li>
@else
    <li>
        <a href="#">{{ $menu_item->name }}</a>
        <ul class="sub-menu">
            @foreach ($listmenu as $item)
                <li><a href="#"> {{ $item->name }}</a></li>
            @endforeach
        </ul>
    </li>

@endif
