<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'is_active' => 1,
        'password' => '$2y$10$1Eo91um9gkB0zLo8b2QntOslSDAOjiExztOmIaM7I4M6ttH6NtTvy', // 123456
        'remember_token' => Str::random(10),
        'created_at' => date("Y-m-d H:i:s")
    ];
});