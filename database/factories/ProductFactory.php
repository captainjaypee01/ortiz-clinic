<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Production\Category;
use App\Models\Production\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->word,
        'price' => $faker->randomNumber(3),
        'description' => $faker->paragraph(3, true),
        'unit' => 'kg',
        'quantity' => $faker->numberBetween(10,999),
    ];
});

$factory->state(Product::class, 'with_categories', [])
        ->afterCreatingState(Product::class, 'with_categories', function ($product, $faker) { 
        $categories = Category::inRandomOrder()->take(rand(1, 12))->pluck('id')->toArray();
        $product->categories()->sync($categories);
});