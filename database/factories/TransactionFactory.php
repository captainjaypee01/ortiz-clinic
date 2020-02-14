<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Transaction\Order;
use App\Models\Transaction\Reservation;
use App\Models\Transaction\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    $input = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $strength = 20;
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    $random_string = strtoupper($random_string);

    return [
        'reference_number' => $random_string,
        'total_services' => $faker->numberBetween(1,5),
        'total_products' => $faker->numberBetween(1,10),
        'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = 'Asia/Manila'), // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
    ];
});

$factory->state(Transaction::class, 'with_reservation_orders', [])
        ->afterCreatingState(Transaction::class, 'with_reservation_orders', function ($transaction, $faker) { 

        factory(Reservation::class)->state('with_reservation_services')->create([
            'transaction_id' => $transaction->id,
            'total_services' => $transaction->total_services,
            'user_id' => $transaction->user_id,
            'reference_number' => $transaction->reference_number,
            'payment_status' => 1,
        ]);
    
        factory(Order::class)->state('with_order_products')->create([
            'transaction_id' => $transaction->id,
            'total_orders' => $transaction->total_products,
            'user_id' => $transaction->user_id,
            'reference_number' => $transaction->reference_number,
            'payment_status' => 1,
        ]);
    
});
