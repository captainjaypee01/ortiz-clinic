<?php

namespace App\Http\Controllers\Frontend\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Record\Branch;

class BranchListController extends Controller
{
    
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.record.branch.index')
                ->withBranches(Branch::where("status", 1)->orderBy("name", "asc")->paginate(5));
    }

}
