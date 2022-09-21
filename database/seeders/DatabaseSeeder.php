<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
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

        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
