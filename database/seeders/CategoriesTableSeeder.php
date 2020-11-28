<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'Cats',
                'Cats description',
                now(),
                now(),
            ],
            [
                'Dogs',
                'Dogs description',
                now(),
                now(),
            ],
        ];

        foreach ($categories as $category) {
            
            \DB::insert("INSERT INTO categories 
                (name, description, created_at, updated_at) 
                VALUES (?, ?, ?, ?)", $category);
        }
    }
}

