<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Profile::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory(\App\User::class)->create()->id;
        },
        'cpf' => $faker->uuid,
        'cell_phone' => $faker->phoneNumber,
        'phone' => $faker->phoneNumber,
        'birth_date' => $faker->date('d-m-Y'),
    ];
});
