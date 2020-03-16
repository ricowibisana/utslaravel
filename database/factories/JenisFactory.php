<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Jenis;
use Faker\Generator as Faker;

$factory->define(Jenis::class, function (Faker $faker) {
    return [
        'nama_baj' => $faker->jobTitle
    ];
});
