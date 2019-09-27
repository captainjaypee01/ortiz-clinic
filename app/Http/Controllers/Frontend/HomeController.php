<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Production\Product;
use App\Models\Record\Service;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index')
            ->withServices(Service::where('status', 1)->orderBy("created_at", "desc")->paginate(3))
            ->withProducts(Product::where('status', 1)->orderBy("created_at", "desc")->paginate(3));
    }
}
