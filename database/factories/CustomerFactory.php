<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'customer_name' => $faker->name,
        'mobile'        => $faker->numerify('##########'),
        'email'         => $faker->unique()->safeEmail,
        'address1'      => $faker->streetName,
        'address2'      => $faker->streetAddress,
        'city'          => $faker->city,
        'pincode'       => $faker->postcode,
        'state'         => $faker->state,
        'country'       => $faker->country,
    ];
});
