<?php

namespace App\Http\Controllers\Backend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Record\Room;
use App\Models\Transaction\Transaction;

class TransactionController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $transactions = Transaction::orderBy("created_at", "desc");
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $transactions = $transactions->where("reference_number", "like", "%". $keyword . "%");
        }

        $transactions = $transactions->paginate(10)->setpath('');
        $transactions->appends($append); 
        return view('backend.transaction.transaction.index',
            [ 
                "search" => $keyword,
                "transactions" => $transactions,
            ]); 
    }

    public function show(Transaction $transaction){
        
        $users = User::role('employee')->get();
        foreach($transaction->reservation->services as $s)
            $branchIds[] = $s->pivot->branch_id;
 
        $rooms = Room::whereIn("branch_id", $branchIds)->where("status", 1)->get(); 
        
        return view('backend.transaction.transaction.show',
            [ 
                "users" => $users,
                "rooms" => $rooms,
                "transaction" => $transaction,
                "reservation" => $transaction->reservation,
                "order" => $transaction->order,
                "orderTotalAmount" => 0, 
            ]);
    }
}
