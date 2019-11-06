<?php

namespace App\Http\Controllers\Backend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Production\Product;
use App\Models\Record\Branch;
use App\Models\Record\Room;
use App\Models\Record\Service;
use App\Models\Transaction\Order;
use App\Models\Transaction\Reservation;
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
        $rooms = null;
        $users = User::role('employee')->get();
        if($transaction->reservation){
            foreach($transaction->reservation->services as $s)
                $branchIds[] = $s->pivot->branch_id;

            $rooms = Room::whereIn("branch_id", $branchIds)->where("status", 1)->get(); 
        }
        
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

    public function create(){

        return view('backend.transaction.transaction.create',
            [
                "users" => User::role('user')->get(),
                "services" => Service::where('status', 1)->get(),
                "branches" => Branch::where("status", 1)->get(),
                "products" => Product::where('status', 1)->get(),
            ]);
    }

    public function store(){
        request()->validate([
            'service' => 'required', 
            'branch' => 'required',  
            'user' => 'required',  
            'product' => 'required',  
            'reservation_date' => 'required',  
            'reservation_time' => 'required',    
        ]);
        // dd(request()); 
        $service = Service::find(request('service'));
        $branch = Branch::find(request('branch'));
        $product = Product::find(request('product'));
        $transaction = new Transaction();
        $transaction->reference_number = $this->checkReference($this->generate_string(20));
        $transaction->user_id = request('user'); 
        $transaction->created_at = request('created_at');
        $transaction->save();

        // Reservation
        $reservation = new Reservation(); 
        $reservation->transaction_id = $transaction->id;
        $reservation->reference_number = $transaction->reference_number;
        $reservation->total_amount = $service->price;  
        $reservation->total_services = 1;
        $reservation->user_id = $transaction->user_id;
        $reservation->created_at = $transaction->created_at;
        $reservation->save();
        $reservation->services()->attach( $service, [
            "branch_id" => $branch->id,
            "reservation_date" => request('reservation_date'),
            "reservation_time" => request('reservation_time'), 
            "duration" => $service->duration, 
            ]);
        
        $transaction->total_services = 1;
        $transaction->total_amount += $reservation->total_amount;

        // Order
        $order = new Order();
        $order->transaction_id = $transaction->id;
        $order->reference_number = $transaction->reference_number;
        $order->total_amount = $product->price;
        $order->total_orders = 1;
        $order->user_id = $transaction->user_id; 
        $order->created_at = $transaction->created_at;
        $order->save();
 
        $order->products()->attach( $product, ["quantity" => request('quantity')]);


        $transaction->total_products = 1;
        $transaction->total_amount += $order->total_amount;
        
        $transaction->save();
        return redirect()->back()->withFlashSuccess('Transaction Saved!');
    } 
    
    function generate_string($strength = 20) {
        $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
     
        return strtoupper($random_string);
    }

    public function checkReference($hash){
        while( count(Transaction::where("reference_number", $hash)->get()) > 0){
            $newHash = $this->generate_string(40);
            $count = Transaction::where("reference_number", $newHash)->count();
            if($count > 0)
                continue;
            else{
                return $newHash;
                break;
            }
        } 
        return $hash; 
    }
}
