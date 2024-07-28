<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 20; $i++) { 
            # code...
            $order = Order::query()->create([
                "customer_id" => mt_rand(1,20),
                "total_amount_ord" => mt_rand(10000,60000),
            ]);
        }
    }
}
