<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Baju;
use Faker\Generator as Faker;

$factory->define(Baju::class, function (Faker $faker) {
	$faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
    return [
        'nama' => $faker->name,
        'harga' => $faker->numberBetween($min=10000, $max=30000)
    	'jenis' => $faker->numberBetween($min=1, $max=3),
        'foto' => $faker->picsum('public/uploads', 400, 400, false)
    ];
});
