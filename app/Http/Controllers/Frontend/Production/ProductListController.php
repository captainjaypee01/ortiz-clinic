<?php

namespace App\Http\Controllers\Frontend\Production;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Mail\Frontend\Transaction\OrderMail;
use App\Models\Production\Product;
use App\Models\Transaction\Order;
use Log;
use Mail;

class ProductListController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.production.product.index')
                ->withProducts(Product::where("status", 1)->orderBy("name", "asc")->paginate(9));
    }
    /**
     * @return \Illuminate\View\View
     */
    public function show(Product $product)
    {
        return view('frontend.production.product.show')
                ->withProduct($product)
                ->withProducts(Product::where("status", 1)->where("id", "<>", $product->id)->orderBy("name", "asc")->paginate(9));
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

    public function addToCart(Product $product){
        request()->validate([
            'quantity' => 'required|numeric|min:1',   
        ]);
        if(!$product) abort(404);

        // dd($product->quantity < request('quantity'));
        if($product->quantity < request('quantity')) return redirect()->back()->withFlashWarning('Product quantity exceeds maximum!');

        $product->quantity = request('quantity');
        $product->total_amount = request('quantity') * $product->price;
        $cart = session()->get('cart'); 
        if(!$cart){ 
            if(!isset($cart["products"])){
                $cart = [
                    "products" => [
                        $product->id => $product
                    ]
                ];
                session()->put('cart', $cart);
                return redirect()->back()->withFlashSuccess('Product added to cart successfully!');
            }
            
        }
        if(isset($cart["products"][$product->id])){ 
            $cart["products"][$product->id] = $product;
            
            session()->put('cart', $cart);
            return redirect()->back()->withFlashSuccess('Product added to cart successfully!');
        }

        $cart["products"][$product->id] = $product;
        
        session()->put('cart', $cart);
        return redirect()->back()->withFlashSuccess('Product added to cart successfully!');

        Log::info($cart);
        dd($cart);
    }

    public function removeFromCart(){
        if(request()->id){
            $cart = session()->get("cart");
            if(isset($cart['products'][request()->id])) {
 
                unset($cart['products'][request()->id]);
 
                session()->put('cart', $cart);
            }
            if(!(count($cart["products"]) > 0))
                unset($cart['products']);

            session()->put('cart', $cart);
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function updateFromCart(){
        if(request()->id){
            $cart = session()->get("cart");
            if(isset($cart['products'][request()->id])) {
                $product = Product::find(request()->id);

                if($product->quantity < request('quantity')) return redirect()->back()->withFlashWarning('Product quantity exceeds maximum!');
                
                $cart["products"][request()->id]["quantity"] = request('quantity');  
                $cart["products"][request()->id]["total_amount"] = $cart["products"][request()->id]["price"] * request('quantity');
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product updated successfully');
        }
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
