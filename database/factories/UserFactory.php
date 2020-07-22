<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\produk;
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
$factory->define(produk::class, function (Faker $faker) {
	return[
		'nama_p' => $faker -> colorname,
		'harga' => $faker -> numberBetween($min = 100000, $max = 900000),
        'harga_r' => $faker -> numberBetween($min = 100000, $max = 800000),
        'qty_p' => $faker -> randomDigitNotNull,
        'img_url' => $faker -> imageUrl($width = 640, $height = 480),
	];
});