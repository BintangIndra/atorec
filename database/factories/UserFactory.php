<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\user;
use App\trans_reseller;
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
/*$factory->define(produk::class, function (Faker $faker) {
	return[
		'nama_p' => $faker -> colorname,
		'harga' => $faker -> numberBetween($min = 100000, $max = 900000),
        'harga_r' => $faker -> numberBetween($min = 100000, $max = 800000),
        'qty_p' => $faker -> randomDigitNotNull,
        'img_url' => $faker -> imageUrl($width = 640, $height = 480),
	];*/
	$factory->define(trans_reseller::class, function (Faker $faker) {
	return[
		'atas_nama' => $faker -> name,
		'alamat' => $faker -> address,
		'tr_qty' => $faker -> numberBetween($min = 1, $max = 10),
        'status' => 'selesai',
        'created_at' => $faker -> dateTimeBetween($startDate = '2020-01-15 02:00:49', $endDate = '2020-08-15 02:00:49'),
        'id_u' => $faker -> numberBetween($min = 1, $max = 2),
        'id_p' => $faker -> numberBetween($min = 1, $max = 30),
	];
});