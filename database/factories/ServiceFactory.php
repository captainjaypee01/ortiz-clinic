<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Record\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomNumber(4),
        'duration' => $faker->randomElement(array('30', '45', '60', '75')),
        'description' => $faker->paragraph(3, true),
        'ip_address' => $faker->ipv4,
    ];
});
