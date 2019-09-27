<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Production\Product;
use App\Models\Record\Service;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard')
                ->withServices(Service::where('status', 1)->orderBy("created_at", "desc")->paginate(3))
                ->withProducts(Product::where('status', 1)->orderBy("created_at", "desc")->paginate(3));
    }
}
