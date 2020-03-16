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
        // $faker = Faker::create('id_ID');

        // for ($i=1; $i <= 100 ; $i++) { 
        	
        // 	DB::table('karyawan')->insert([
        // 		'nama' => 
        // 	]);

        // }
        factory(\App\Jenis::class, 5)->create();
        factory(\App\Baju::class, 5)->create();
    }
}
