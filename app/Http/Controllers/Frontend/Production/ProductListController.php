<?php

namespace App\Http\Controllers\Frontend\Production;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Production\Product;

class ProductListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.production.product.index')
                ->withProducts(Product::where("status", 1)->orderBy("name", "asc")->paginate(5));
    }
}
