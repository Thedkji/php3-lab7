<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            # code...
            $customer = Customer::query()->create([
                "name_cus" => fake()->name(),
                "address_cus" => fake()->address(),
                "phone_cus" => fake()->phoneNumber(),
                "email_cus" => fake()->email(),
            ]);
        }
    }
}
