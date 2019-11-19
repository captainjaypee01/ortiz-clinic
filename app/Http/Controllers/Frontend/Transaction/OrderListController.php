<?php

namespace App\Http\Controllers\Frontend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction\Order;
use Log;

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

    public function upload(Order $order){
        Log::info(request());
        request()->validate([
            'upload_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024', 
        ]);
        if(request()->hasFile('upload_file')){
            $file = request()->upload_file;
            // $location = $file->store("uploads/order", 'gcs');  
            $location = $file->store("order"); 
            $order->payment_location = $location;
            $order->save();
            return redirect()->route('frontend.transaction.order.show', $order)->withFlashSuccess("Payment Upload Successfully");
        }

        return redirect()->route('frontend.transaction.order.show', $order)->withFlashWarning("Please re-upload your payment");
    }
}
