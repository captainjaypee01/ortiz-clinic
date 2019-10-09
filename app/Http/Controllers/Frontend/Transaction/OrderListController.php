<?php

namespace App\Http\Controllers\Frontend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction\Order;

class OrderListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        
        $orders = auth()->user()->orders()->orderBy("created_at", "desc");
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $orders = $orders->where("reference_number", "like", "%". $keyword . "%");
        }

        $orders = $orders->paginate(10)->setpath('');
        $orders->appends($append); 
        return view('frontend.transaction.order.index')
                ->withOrders($orders);
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function show(Order $order)
    {
        return view('frontend.transaction.order.show')
                ->withOrder($order);
    }
}
