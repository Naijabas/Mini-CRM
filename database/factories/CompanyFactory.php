<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'website' => 'https://twitter.com',
        'logo' => $faker->imageUrl(100, 100, 'cats', true, 'Faker', true),
        'user_id' => 1
    ];
});
