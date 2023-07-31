<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'client_id' => mt_rand(1, 10),
            'disc_id' => mt_rand(1, 10),
            'quantity' => mt_rand(1, 10),
            'total_value' => mt_rand(1, 1000),
            'status' => 'sold'
        ]);
    }
}
