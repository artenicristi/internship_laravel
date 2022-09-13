<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const CATEGORIES = [
            "Tourism",
            "Sales",
            "Finance",
            "Marketing",
            "IT",
            "Management",
            "Production",
            "HR",
            "Purchasing",
            "R&D",
            "Logistics",
            "Consultancy",
            "Training",
            "Other sectors",
        ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        collect(self::CATEGORIES)->each(fn ($category) => Category::create(['name' => $category]));

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
