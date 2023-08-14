<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
// use Illuminate\Support\Collection;

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
		// $user = ($faker->boolean(75)) ? User::inRandomOrder()->first()->distr_code : NULL ;
		$user = User::inRandomOrder()->first()->distr_code;

		$uname = $faker->firstName;
		$ulastname = $faker->lastName;
		// $user = User::all()->inRandomOrder()->first();
		$subname = (!empty($ulastname)) ? substr($uname, 0, 3) : $uname ;
		$sublast =(!empty($ulastname)) ? substr($ulastname, 0, 3) : '' ;
		$num = rand(1000, 9999);
		$distr_code = $subname.$sublast.'-'.$num;

		$userf = $faker->userName;
	    return [
				'name' => $uname,
        'lastname' => $ulastname,
				'username' => $userf,
        'email' => $userf.'@wozial.com',
        'email_verified_at' => now(),
				'distr_code' => $distr_code,
				'referido_by' => $user,
				'password' => bcrypt('wz123'), // wz123
        'remember_token' => Str::random(10),
    ];
});
