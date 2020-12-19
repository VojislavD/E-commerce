<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Item;
use Faker\Generator as Faker;
use App\Category;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(10, true),
        'code' =>  $faker->randomNumber(8),
        'price' => $faker->randomFloat(2,10,200),
        'description' => $faker->paragraph(8,true),
        'rate' => $faker->numberBetween(1,5),
        'image_url' => 'https://picsum.photos/id/'.$this->faker->numberBetween(1,500).'/400/600',
        'stock' => $faker->numberBetween(1,100),
        'category_id' => Category::all()->random()->id,
    ];
});
