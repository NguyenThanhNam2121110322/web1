<nav class="main-menu">
    @foreach ($listmenu as $rowmenu)
        <x-main-menu-item :rowmenu="$rowmenu" />
    @endforeach
    
</nav>

