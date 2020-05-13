<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'customer_id' => 1,
        'orderID' => 'WG'.date('ymds').$faker->randomDigit,
        'name' => $faker->name,
        'amount' => $faker->randomFloat(2, 500, 10000),
        'reference_code' => $faker->randomDigit,
    ];
});
