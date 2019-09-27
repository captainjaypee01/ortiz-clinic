<?php

namespace App\Http\Controllers\Frontend\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Record\Service;

class ServiceListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.record.service.index')
                ->withServices(Service::where("status", 1)->orderBy("name", "asc")->paginate(5));
    }
}
