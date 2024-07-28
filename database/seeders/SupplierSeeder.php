<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            # code...
            $supperlier = Supplier::query()->create([
                "name_sup" => fake()->name(),
                "address_sup" => fake()->address(),
                "phone_sup" => fake()->phoneNumber(),
                "email_sup" => fake()->email(),
            ]);
        }
    }
}
