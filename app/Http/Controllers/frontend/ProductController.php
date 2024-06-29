<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{


    public function index(Request $request)
    {
        $perPage = 9;
        $page = $request->query('page', 1);

        $list_all_product = Product::where('product.status', '!=', 0)
            ->join('category', 'category.id', '=', 'product.category_id')
            ->join('brand', 'brand.id', '=', 'product.brand_id')
            ->select('product.id', 'product.name', 'product.image', 'category.name as categoryname', 'brand.name as brandname', 'product.detail', 'product.price','product.slug')
            ->orderBy('product.created_at', 'desc')
            ->paginate($perPage, ['*'], 'page', $page);

        if ($request->ajax()) {
            return view('frontend.product_item', compact('list_all_product'));
        } else {
            return view('frontend.product', compact('list_all_product'));
        }
    }


    public function detail($slug)
    {
        $args_product_detail = [
            ['product.status', '!=', 0],
            ['product.slug', $slug]
        ];
        $detail_product = Product::where($args_product_detail)
        ->join('category', 'category.id', '=', 'product.category_id')
        ->join('brand', 'brand.id', '=', 'product.brand_id')
        ->select('product.id', 'product.name', 'product.image', 'category.name as categoryname', 'brand.name as brandname', 'product.detail', 'product.price','product.slug','product.description')
        ->orderBy('product.created_at', 'desc')
        ->first();

        if (!$detail_product) {
            abort(404); // Hoặc chuyển hướng đến trang 404 tùy chỉnh
        }

        $related_products = Product::where('product.status', '!=', 0)
        ->where(function ($query) use ($detail_product) {
            $query->where('product.category_id', $detail_product->category_id)
                  ->orWhere('product.brand_id', $detail_product->brand_id);
        })
        ->where('product.id', '!=', $detail_product->id) // Loại trừ sản phẩm hiện tại
        ->join('category', 'category.id', '=', 'product.category_id')
        ->join('brand', 'brand.id', '=', 'product.brand_id')
        ->select('product.id', 'product.name', 'product.image', 'category.name as categoryname', 'brand.name as brandname', 'product.detail', 'product.price', 'product.slug', 'product.pricesale')
        ->orderBy('product.created_at', 'desc')
        ->limit(4)
        ->get();

        $list_product_new = Product::where('product.status', '!=', 0)
        ->join('category', 'category.id', '=', 'product.category_id')
        ->join('brand', 'brand.id', '=', 'product.brand_id')
        ->select('product.id', 'product.name', 'product.image', 'category.name as categoryname', 'brand.name as brandname','product.detail','product.price','product.slug','product.pricesale')
        ->orderBy('product.created_at', 'desc')
        ->limit(4)
        ->get();
        return view("frontend.product_detail",compact('detail_product','list_product_new','related_products'));
    }

    public function category($slug)
    {
        $row=Category::where('slug','=',$slug)->select("id", "name", "slug")->first();
        $listcatid=[];
        if($row!=null)
        {
            $listcatid = $this->getlistcategoryid($row->id);
        }
        $list_product = Product::where('status', '=', 1)
        ->whereIn('category_id', $listcatid)
        ->orderBy('created_at','desc')
        ->paginate(9);
        return view("frontend.product_category", compact('list_product', 'row'));
    }

    public function getlistcategoryid($rowid)
{
    $listcatid=[];
        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id','=',$rowid], ['status','=',1]])->select("id")->get();
        if(count($list1)>0)
        {
            foreach($list1 as $row1)
            {
                array_push($listcatid, $row1->id);
                $list2 = Category::where([['parent_id','=', $row1->id],['status','=',1]])->select("id")->get();
                if(count($list2)>0)
                {
                    foreach($list2 as $row2)
                    {
                        array_push($listcatid, $row2->id);
                        // $list2 = Category::where([['parent_id','=',$row1->id],['status','=',1]])->select("id")->get();
                    }
                }
            }
        }
        return $listcatid;

}
}
