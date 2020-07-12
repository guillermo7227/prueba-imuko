<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'city_id' => City::all()->random()->id
    ];
});
