<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args1=[
            ['status','=',1],
        ];
        $list = Post::where($args1)
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
        return view('components.post',compact('list'));
    }
}
