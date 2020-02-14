<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Record\Branch;
use App\Models\Record\Room;
use App\Models\Record\Service;
use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'contact_number' => $faker->e164PhoneNumber,
        'tel_number' => $faker->tollFreePhoneNumber,
        'city' => $faker->city,
        'province' => $faker->state,
        'barangay' => $faker->streetName,
        'country' => $faker->country,
        'address_line_1' => $faker->streetAddress,
        'lat' => $faker->latitude(14.444444, 14.7777777),
        'lng' => $faker->longitude(120.0968037, 121.099107),
    ];
});

$factory->state(Branch::class, 'with_room', [])
        ->afterCreatingState(Branch::class, 'with_room', function ($branch, $faker) { 
            
        factory(Room::class, $faker->numberBetween(1,4))->create([
            'branch_id' => $branch->id,
            'name' => $faker->word,
        ]);

});

$factory->state(Branch::class, 'with_services', [])
        ->afterCreatingState(Branch::class, 'with_services', function ($branch, $faker) { 
        $services = Service::inRandomOrder()->take(rand(1, 12))->pluck('id')->toArray();
        $branch->services()->sync($services);
});