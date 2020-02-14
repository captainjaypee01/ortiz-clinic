<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Record\Service;
use App\Models\Transaction\Reservation;
use App\Models\Transaction\Transaction;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        //
    ];
});


$factory->state(Reservation::class, 'with_reservation_services', [])
        ->afterCreatingState(Reservation::class, 'with_reservation_services', function ($reservation, $faker) { 

        $services = Service::inRandomOrder()->take($reservation->total_services)->get();
        $totalAmount = $services->sum('price');
        foreach($services as $service){
            $reservation->services()->attach( $service, [
                "branch_id" => $service->branch_id,
                "reservation_date" => $service->reservation_date,
                "reservation_time" => $service->reservation_time, 
                "duration" => $service->duration, 
                ]);
        }

        $reservation->total_amount = $totalAmount;
        $reservation->save();

        $transaction = Transaction::find($reservation->transaction_id);
        $transaction->total_amount += $totalAmount;
        $transaction->save();

});