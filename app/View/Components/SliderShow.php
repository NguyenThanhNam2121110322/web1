<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SliderShow extends Component
{
    /**
     * Create a new component instance.
     */
    public $row_menu = null;
    public function __construct($rowmenu)
    {
        $this->row_menu = $rowmenu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu_item = $this->row_menu;

        $argsl=[
            ['status','=',1],
            ['position','=','mainmenu'],
            ['parent_id','=',$menu_item->id]
        ];
        $listmenu = Menu::where($argsl)->orderBy('sort_order','asc')->get();
        return view('components.slider-show');
    }
}
