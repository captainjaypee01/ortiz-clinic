<?php

namespace App\Http\Controllers\Frontend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Mail\Frontend\Transaction\OrderMail;
use App\Mail\Frontend\Transaction\ReservationMail;
use App\Models\Production\Product;
use App\Models\Transaction\Order;
use App\Models\Transaction\Reservation;
use App\Models\Transaction\Transaction;
use Mail;

class ReservationListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reservations = auth()->user()->reservations()->orderBy("created_at", "desc");
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $reservations = $reservations->where("reference_number", "like", "%". $keyword . "%");
        }

        $reservations = $reservations->paginate(10)->setpath('');
        $reservations->appends($append); 
        return view('frontend.transaction.reservation.index')
                ->withReservations($reservations );
    }
    
    /**
     * @return \Illuminate\View\View
     */
    public function show(Reservation $reservation)
    {
        return view('frontend.transaction.reservation.show')
                ->withReservation($reservation)
                ->withService($reservation->service);
    }

    public function showCart(){
        $cart = session()->get('cart'); 
        // dd($cart);
        return view('frontend.transaction.cart.index',
                [
                    "cart" => $cart,
                ]
                );
    }

    public function checkout(){
        $cart = session()->get("cart");
        $transaction = new Transaction();
        $transaction->reference_number = $this->checkReference($this->generate_string(20));
        $transaction->user_id = auth()->user()->id; 
        $transaction->save();
        if(isset($cart["reservations"])){
            
            $reservation = new Reservation(); 
            $reservation->transaction_id = $transaction->id;
            $reservation->reference_number = $transaction->reference_number;
            $reservation->total_amount = array_sum(array_column($cart["reservations"],'price'));  
            $reservation->total_services = count($cart["reservations"]);
            $reservation->user_id = auth()->user()->id;
            $reservation->save();

            foreach($cart["reservations"] as $service){
                $reservation->services()->attach( $service, [
                                                    "branch_id" => $service->branch_id,
                                                    "reservation_date" => $service->reservation_date,
                                                    "reservation_time" => $service->reservation_time, 
                                                    "duration" => $service->duration, 
                                                    ]);
                }
            $transaction->total_services = count($cart["reservations"]);
            $transaction->total_amount += $reservation->total_amount;
            $user = auth()->user(); 
            Mail::to($user->email)->send(new ReservationMail($user, $service, $reservation));

        }
        if(isset($cart["products"])){ 
            $order = new Order();
            $order->transaction_id = $transaction->id;
            $order->reference_number = $transaction->reference_number;
            $order->total_amount = array_sum(array_column($cart["products"],'total_amount'));
            $order->total_orders = count($cart["products"]);
            $order->user_id = auth()->user()->id;
            // dd($order);
            $order->save();

            foreach($cart["products"] as $product){
                $order->products()->attach( $product, ["quantity" => $product->qty]);
                $prod = Product::find($product->id);
                $prod->quantity -= $product->qty;
                $prod->save();
            }


            $transaction->total_products = count($cart["products"]);
            $transaction->total_amount += $order->total_amount;
            $user = auth()->user(); 
            Mail::to($user->email)->send(new OrderMail($user, $product, $order, request('quantity')));
            
        }
        $transaction->save();
        unset($cart); 
        session()->flush();
        return redirect()->back()->withFlashSuccess('Checked Out Successfully!');
    }
    public function upload(Reservation $reservation){ 
        request()->validate([
            'upload_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512', 
        ]);
        if(request()->hasFile('upload_file')){
            $file = request()->upload_file;
            // $location = $file->store("uploads/reservation", 'gcs'); 
            $location = $file->store("reservation");  
            $reservation->payment_location = $location;
            $reservation->save();
            return redirect()->route('frontend.transaction.reservation.show', $reservation)->withFlashSuccess("Payment Upload Successfully");
        }

        return redirect()->route('frontend.transaction.reservation.show', $reservation)->withFlashWarning("Please re-upload your payment");
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

    public function checkOrderReference($hash){ 

        while( count(Order::where("reference_number", $hash)->get()) > 0){
            $newHash = $this->generate_string(40);
            $count = Order::where("reference_number", $newHash)->count();
            if($count > 0)
                continue;
            else{
                return $newHash;
                break;
            }
        } 
        return $hash; 
    }

    public function checkReservationReference($hash){ 

        while( count(Reservation::where("reference_number", $hash)->get()) > 0){
            $newHash = $this->generate_string(40);
            $count = Reservation::where("reference_number", $newHash)->count();
            if($count > 0)
                continue;
            else{
                return $newHash;
                break;
            }
        } 
        return $hash; 
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
