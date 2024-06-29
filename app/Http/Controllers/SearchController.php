<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function index()
    {
        // Trả về view hiển thị trang tìm kiếm
        return view('search.index');
    }

    public function search(Request $request)
    {
        // Xử lý logic tìm kiếm và trả về kết quả
        $searchTerm = $request->input('search_term');
        $results = $this->performSearch($searchTerm);

        // Trả về view hiển thị kết quả tìm kiếm
        return view('frontend.search_result', compact('results'));
    }

    protected function performSearch($searchTerm)
    {
        // Viết logic tìm kiếm ở đây, ví dụ:
        $products = Product::where('name', 'like', '%' . $searchTerm . '%')
        ->paginate(9);
        return $products;
    }

}
