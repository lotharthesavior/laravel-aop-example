<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'uuid' => (string) Uuid::generate(),
        'total' => rand(500, 1500),
    ];
});
