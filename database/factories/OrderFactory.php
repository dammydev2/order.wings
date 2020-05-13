<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'orderID' => 'WG'.date('ymds').$faker->randomDigit,
        'customer_id' => 1,
        'pickup_address' => $faker->sentence,
        'delivery_address' => $faker->sentence,
        'receiver_name' => $faker->name,
        'receiver_phone' => $faker->randomDigit(11111111111,999999999999),
        'distance' => $faker->randomFloat(2, 100, 1000),
        'weight' => $faker->randomDigit(1, 100),
        'item' => $faker->sentence,
        'quantity' => $faker->randomDigit(1, 10),
        'riderID' => $faker->randomDigit,
        'status' => $faker->randomElement(['pending', 'transit', 'delivered']),
    ];
});
