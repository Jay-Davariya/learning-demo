<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'name' => Str::random(10),
            'product_name' => Str::random(10),
            'mrp' => Str::random(10),
            'sellprice' => Str::random(10),
            'expiry' => Str::random(10),
            'country' => Str::random(10),
            'state' => Str::random(10),
            'city' => Str::random(10),
            'address' => Str::random(10),
          
    ]);
    }
}
