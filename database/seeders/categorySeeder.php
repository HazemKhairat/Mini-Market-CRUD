<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->count(20)->create();
    }
    // public function data(){
    //     return [
    //         'title' => "firstTitle",
    //         'discription' => "firstDiscription"
    //     ];
    // } 
}
