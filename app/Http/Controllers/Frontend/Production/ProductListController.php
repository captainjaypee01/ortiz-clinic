<?php

namespace App\Http\Controllers\Frontend\Production;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Mail\Frontend\Transaction\OrderMail;
use App\Models\Production\Product;
use App\Models\Transaction\Order;
use Mail;

class ProductListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.production.product.index')
                ->withProducts(Product::where("status", 1)->orderBy("name", "asc")->paginate(5));
    }
    /**
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('frontend.production.product.show')
                ->withProduct($product);
    }


    public function order(Product $product){
        request()->validate([
            'quantity' => 'required|numeric|min:1',   
        ]);
        $order = new Order(); 
        $order->reference_number = $this->checkReference($this->generate_string(20));
        return $this->save($order, $product);
    }

    public function save($order, $product){
 
        $order->total_amount = request('quantity') * $product->price;
        $order->total_orders = 1;
        $order->user_id = auth()->user()->id;
        $order->save();

        $order->products()->attach( $product, ["quantity" => request("quantity")]);

        $user = auth()->user();

        Mail::to($user->email)->send(new OrderMail($user, $product, $order, request('quantity')));

        return redirect()->route('frontend.transaction.order.index')->withFlashSuccess("Order Successfully Saved. Please check your email for your notification.<br>REFERENCE NUMBER : <strong>" . $order->reference_number. "</strong>");
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

        while( count(Order::where("reference_number", $hash)->get()) > 0){
            $newHash = $this->generate_string(40);
            $count = Upload::where("reference_number", $newHash)->count();
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
