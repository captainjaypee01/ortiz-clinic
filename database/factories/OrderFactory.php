<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Production\Product;
use App\Models\Transaction\Order;
use App\Models\Transaction\Transaction;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->state(Order::class, 'with_order_products', [])
        ->afterCreatingState(Order::class, 'with_order_products', function ($order, $faker) { 

        $products = Product::inRandomOrder()->take($order->total_products)->get();
        $totalAmount = 0;
        foreach($products as $product){
            $qty = rand(1,100);
            $amount = $product->price * $qty;
            $totalAmount += $amount;
            $order->products()->attach( $product, [
                    'quantity' => $qty,
                ]);
        }

        $order->total_amount = $totalAmount;
        $order->save();

        $transaction = Transaction::find($order->transaction_id);
        $transaction->total_amount += $totalAmount;
        $transaction->save();

});