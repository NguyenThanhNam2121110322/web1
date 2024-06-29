<?php

namespace App\View\Components;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductNew extends Component
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
        $args1 = [
            ['status', '=', 1],
        ];
        $list = Product::where($args1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        $categories = Category::where($args1)
            ->get();
        $brands = Brand::where($args1)
            ->get();
        return view('components.product-new', compact('list', 'categories', 'brands'));
    }
}
