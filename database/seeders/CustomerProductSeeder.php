<?php

namespace Database\Seeders;

use App\Models\CustomerProduct;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CustomerProduct::factory()->count(20)->create();
    }
}
