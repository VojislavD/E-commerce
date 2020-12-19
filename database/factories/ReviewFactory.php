<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'item_id' => App\Item::all()->random()->id,
        'email' => $faker->unique()->safeEmail,
        'comment' => $faker->paragraph(4),
        'rate' => $faker->numberBetween(1,5),
        'status' => $faker->numberBetween(0,2)
    ];
});
