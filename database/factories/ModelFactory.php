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
       'status' => $faker->randomElement([0, 1, 2, 3, 4, 5, 6]),
       'latitude' => $faker->latitude,
       'longitude' => $faker->longitude,
       'phone' => $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit . $faker->randomDigit
   ];
});



$factory->define(\Toilets\Models\Message::class, function(Faker\Generator $faker){
    $user_id_array = \Toilets\Models\User::all()->lists('id')->all();
    $business_id_array = \Toilets\Models\Business::all()->lists('id')->all();
    return [
        'business_id' => $faker->randomElement($business_id_array),
        'user_id' => $faker->randomElement($user_id_array),
        'body' => $faker->text(500),
        'anonymous' => $faker->boolean()
    ];
});



$factory->define(\Toilets\Models\Activity::class, function(Faker\Generator $faker) {

    $reflector = new ReflectionClass(\Toilets\Models\Activity::class);
    $activity_constants = array_values(array_except($reflector->getConstants(), ['CREATED_AT', 'UPDATED_AT']));

    $user_id_array = \Toilets\Models\User::all()->lists('id')->all();

    $data_closure = function() use($faker) {
        return [
            'foo' => $faker->text(25),
            'bar' => $faker->text(50),
            'baz' => $faker->numberBetween()
        ];
    };

    return [
        'subject_id' => $faker->randomElement($user_id_array),
        'subject_type' => $faker->randomElement([Toilets\Models\User::class, Toilets\Models\Business::class, Toilets\Models\Message::class]),
        'description' => $faker->randomElement($activity_constants),
        'ip' => $faker->ipv4,
        'data' => $data_closure()
    ];
});