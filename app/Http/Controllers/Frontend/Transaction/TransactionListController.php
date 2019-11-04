<?php

namespace App\Http\Controllers\Frontend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction\Transaction;

class TransactionListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $transactions = auth()->user()->transactions()->orderBy("created_at", "desc");
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $transactions = $transactions->where("reference_number", "like", "%". $keyword . "%");
        }

        $transactions = $transactions->paginate(10)->setpath('');
        $transactions->appends($append); 
        return view('frontend.transaction.transaction.index')
                ->withTransactions($transactions );
    }
    
    
    public function show(Transaction $transaction){ 
        
        return view('frontend.transaction.transaction.show',
            [  
                "transaction" => $transaction,
                "reservation" => $transaction->reservation,
                "order" => $transaction->order,
                "orderTotalAmount" => 0, 
            ]);
    }

}
