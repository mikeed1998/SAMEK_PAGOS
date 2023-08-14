<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Novedad;
use Faker\Generator as Faker;

$factory->define(Novedad::class, function (Faker $faker) {
	$dir = public_path('img/photos/novedades/');
	$width = $faker->numberBetween(600,950);
	// $height = $faker->numberBetween(600,950);
	$height = $width;
	// $sourceDir = '/home/wozial/Descargas/faker/pdf';
	$sourceDir = 'C:\Users\yahir\Downloads\faker\pdf';
	return [
		'titulo' => $faker->realText($maxNbChars = 20, $indexSize = 2),
		// 'portada' => $faker->image($dir, $width, $height, false),
		// 'portada' => $faker->imageUrl( $width, $height,'', true, $faker->boolean(50)),
		// 'portada' => $faker->file('/home/wozial/Descargas/faker/imgs/999/', $dir, false),
		'portada' => $faker->file('C:\Users\yahir\Downloads\faker\imgs\999', $dir, false),
		'descripcion' => $faker->sentence($nbWords = 20, $variableNbWords = false),
		'pdf' => $faker->file($sourceDir, $dir, false),
		'inicio' => '0',
		'activo' => '1',
		'orden' => '666',
	];
});
