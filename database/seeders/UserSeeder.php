<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'is_admin' => 1,
        ]);

        User::factory(5, [])->create();

        $userCreator1 = User::find(2);
        $userCreator2 = User::find(3);
        $userAccess = User::find(4);

        $userCreator1->assignRole('creator');
        $userCreator2->assignRole('creator');
        $userAccess->assignRole('user');
    }
}
