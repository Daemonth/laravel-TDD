<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

<<<<<<< HEAD
$factory->define(App\User::class, function (Faker\Generator $faker) {
=======
$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
>>>>>>> origin/master
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});
