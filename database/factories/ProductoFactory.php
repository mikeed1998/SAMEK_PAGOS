<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Producto::class, function (Faker $faker) {
    $namex = array('aloe vera','curcuminoids', 'royal honey', 'hi', 'lactos','royal gel' );
    $name = $faker->bothify($faker->randomElement($namex).' ##??') ;
    $pp = $faker->numberBetween(300,650);
    $pei = $pp-($pp*(40/100));
    $pcc = $pp-($pp*(43/100));
    $pa = $pp-($pp*(45/100));
    $pb = $pp-($pp*(50/100));
    // selling price = actual price - (actual price * (discount / 100))
    return [
      'clave' => $faker->bothify('##??'),
      'nombre' => $name,
      'descripcion' => $faker->sentence($nbWords = 20, $variableNbWords = false),
      'precio_publico' => $pp,
      'precio_ei' => $pei,
      'precio_cc' => $pcc,
      'precio_a' => $pa,
      'precio_b' => $pb,
      'iva' => $faker->randomFloat($nbMaxDecimals = 2, $min = 15, $max = 46),
      'puntos' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 21),
      'fxc' => $faker->randomDigit,
      'peso' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 4),
      'slug' => Str::slug($name, '-'),
  		'stock' => '0',
  		'inicio' => '0',
  		'activo' => '1',
  		'orden' => '666',
    ];
});
