<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\House;
use Faker\Generator as Faker;

$factory->define(House::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'address' => $faker->address,
        'poster' => $faker->imageUrl(640, 480),
        'description' => $faker->text,
    ];
});
