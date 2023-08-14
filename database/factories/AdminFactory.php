<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin;
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

$factory->define(App\Models\Admin::class, function (Faker $faker) {
		$user = $faker->userName;
	    return [
				'user' => $user,
        'email' => $user.'@wozial.com',
        'role' => '1',
        'password' => bcrypt('minimusa'), // minimusa
        'remember_token' => Str::random(10),
    ];
});
