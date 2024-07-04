<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'User',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'IMSD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'ORD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'COA',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'CASHIER',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'ACCOUNTING',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'ARD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'RD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'CDO_PD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'CAM_PD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'BUK_PD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'LAN_PD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'MIS_OC_PD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'MIS_OR_PD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'TSSD',
            'guard_name' => 'web',
        ]);

        Role::create([
            'name' => 'BUDGET_UNIT',
            'guard_name' => 'web',
        ]);


    }
}
