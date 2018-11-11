<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Prospect::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(\App\User::class)->create()->id;
        },
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->streetAddress,
        'number' => (string)$faker->numberBetween(1, 2000),
        'district' => $faker->city,
        'city' => $faker->citySuffix,
        'state' => strtoupper(str_random('2'))
    ];
});
