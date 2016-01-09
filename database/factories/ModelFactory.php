<?php

$factory->define(Toilets\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\Toilets\Models\Business::class, function(Faker\Generator $faker) {
   return [
       'name' => $faker->company,
       'email' => $faker->companyEmail,
       'address' => $faker->address,
       'industry' => $faker->bs,
       'description' => $faker->text(500),
       'status' => $faker->randomElement([1, 2, 3, 4, 5]),
       'latitude' => $faker->latitude,
       'longitude' => $faker->longitude,
       'phone' => $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit
   ];
});

$factory->define(\Toilets\Models\Message::class, function(Faker\Generator $faker) {
    return [
        'business_id' => $faker->randomElement(\Toilets\Models\Business::all()->lists('id')->all()),
        'user_id' => $faker->randomElement(\Toilets\Models\User::all()->lists('id')->all()),
        'message' => $faker->text(500)
    ];
});