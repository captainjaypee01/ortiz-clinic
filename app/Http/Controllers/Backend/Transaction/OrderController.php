<?php

namespace App\Http\Controllers\Backend\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;
use App\Models\Production\Product;
use App\Models\Transaction\Order;
use Log;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::orderBy("created_at", "desc");
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $orders = $orders->where("reference_number", "like", "%". $keyword . "%");
        }

        $orders = $orders->paginate(10)->setpath('');
        $orders->appends($append); 
        return view('backend.transaction.order.index',
            [ 
                "search" => $keyword,
                "orders" => $orders,
            ]); 
    }

    public function create(){
        $customers = User::where("active", 1)->get();
        $products = Product::where('status', 1)->get();
        return view('backend.transaction.order.create',
            [
                'customers' => $customers,
                'products' => $products,
            ]);
    }

    public function show(Order $order){ 
        return view('backend.transaction.order.show',
            [ 
                "order" => $order,  
            ])
            ->withOrderProducts($order->products->all())
            ->withTotalAmount(0);
    }

    public function edit(Order $order){
        $products = Product::where('status', 1)->get();
        return view('backend.transaction.order.edit',
            [ 
                "order" => $order, 
                'products' => $products, 
            ])
            ->withOrderProducts($order->products->all()) ;
    }

    public function store(Request $request){
        $order = new Order();
        request()->validate([
            'customer' => 'required',   
        ]);
        $order->reference_number = $this->checkReference($this->generate_string(20));
        return $this->save($request, $order);
    }

    public function update(Request $request, Order $order){
        return $this->save($request, $order);
    }
    public function destroy(Order $order){
        $order->delete();
        return redirect()->route('admin.transaction.order.index')->withFlashSuccess("Order Successfully Deleted");
    }

    public function save($form, $order){
        request()->validate([ 
            'products' => 'required',
            'customer' => 'required',
            "quantity.*" => 'required',   
        ]);

        $products = Product::whereIn("id",request("products"))->orderBy("id", "asc")->get(); 
        $total_amount = 0;
        $i = 0;
        foreach ($products as $product) { 
            $total_amount += (request("quantity")[$i] * $product->price); 
            $i++;
        } 
 
        if(isset($form['customer']))
            $order->user_id = $form["customer"];

        if(isset($form['total_amount']))
            $order->total_amount = $total_amount;

        if(isset($form['total_orders']))
            $order->total_orders = count(request("products"));
        
            
        $order->save();
        for($i = 0; $i < count(request("products")); $i++)
            $order->products()->attach( request("products")[$i], ["quantity" => request("quantity")[$i]]);

        $user = User::find($order->user_id);
        
        Mail::to($user->email)->send(new OrderMail($user, $product, $order, request('quantity')));
        
        return redirect()->route('admin.transaction.order.index')->withFlashSuccess("Order Successfully Saved. Please check your email for your notification.<br>REFERENCE NUMBER : <strong>" . $order->reference_number. "</strong>");

    }

    public function mark(Order $order, $status){
        $order->status = $status;
        $order->save();
        return redirect()->route('admin.transaction.order.index')->withFlashSuccess("Order Status Saved");
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
