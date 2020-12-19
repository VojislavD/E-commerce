<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;
use App\User;

$factory->define(Order::class, function (Faker $faker) {
    $user = User::inRandomOrder()->first();
    $price = $faker->numberBetween(10, 1500);
    $shipping = ($price < 100) ? 13 : 0;

    return [
        'first_name' => $user->first_name,
        'last_name' => $user->last_name,
        'email' => $user->email,
        'phone' => $user->phone,
        'postal_code' => $user->postal_code,
        'city' => $user->city,
        'address' => $user->address,
        'sum' => $price,
        'shipping' => $shipping,
        'total' => $price,
        'type_of_payment' => 'delivery',
        'payment' => false,
        'status' => $faker->numberBetween(0,3)
    ];
});
