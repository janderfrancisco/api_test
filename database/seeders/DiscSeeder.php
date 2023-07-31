<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discs')->insert([
            'style' => Str::random(10),
            'artist' => Str::random(15),
            'name' => Str::random(15), 
            'year_of_release' => mt_rand(2000, 2022)
        ]);
    }
}
