<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            # code...
            $product = Product::query()->create([
                "supplier_id" => mt_rand(1,20),
                "name_pro" => fake()->name(),
                "description" => fake()->title(),
                "price_pro" => $i."00000",
                "quantity" => mt_rand(1,50),
            ]);
        }
    }
}
