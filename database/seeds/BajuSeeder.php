<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Jenis;
use App\Baju;

class BajuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(\App\Jenis::class, 5)->create();
        factory(\App\Baju::class, 5)->create();
    }
}
