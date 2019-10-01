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
        return view('frontend.transaction.order.index')
                ->withOrders(auth()->user()->orders );
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
