<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'category_access',
            'category_create',
            'category_edit',
            'category_delete',
            'company_access',
            'company_create',
            'company_edit',
            'company_delete',
            'vacancy_access',
            'vacancy_create',
            'vacancy_edit',
            'vacancy_delete',
        ];

        foreach ($permissions as $permission){
            Permission::create([
                'name' => $permission
            ]);
        }

        $userCreator = [
            'category_create',
            'company_create',
            'vacancy_create',
        ];

        $userAccess = [
            'category_access',
            'company_access',
            'vacancy_access',
        ];

        $roleCreator = Role::findById(3);
        $roleAccess = Role::findById(2);

        foreach ($userCreator as $permission){
            $roleCreator->givePermissionTo($permission);
        }

        foreach ($userAccess as $permission){
            $roleAccess->givePermissionTo($permission);
        }
    }
}
