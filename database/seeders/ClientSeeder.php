<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => Str::random(10),
            'email' => Str::random(20).'@gmail.com',
            'phone' => Str::random(11),
            'doc' => mt_rand(10000000000, 99999999999)
        ]);
    }
}
