<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->times(50)->state([
        //     'created_at'=> fn() => now()->subMinutes(rand(0,59))
        // ])->create();

        \App\Models\Brand::factory()->times(10)->state([
            'created_at'=> fn() => now()->subMinutes(rand(0,59))
        ])->create();
        
        \App\Models\Category::factory()->times(20)->state([
            'created_at'=> fn() => now()->subMinutes(rand(0,59))
        ])->create();
        
        \App\Models\Product::factory()->times(50)->state([
            'created_at'=> fn() => now()->subMinutes(rand(0,59))
        ])->create();
        // \App\Models\User::factory(10)->create();
        // \App\Models\Brand::factory(20)->create();
        // \App\Models\Category::factory(20)->create();
        // \App\Models\Product::factory(30)->create();
    }
}
