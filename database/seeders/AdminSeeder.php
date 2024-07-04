<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        User::create([
            'first_name'    => 'Super',
            'last_name'     => 'Admin',
            'email'         =>  'admin@admin.com',
            'mobile_number' =>  '9028187696',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 1
        ]);

        User::create([
            'first_name'    => 'User',
            'last_name'     => 'Admin',
            'email'         =>  'user@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 2
        ]);

        User::create([
            'first_name'    => 'IMSD',
            'last_name'     => 'Admin',
            'email'         =>  'IMSD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 3
        ]);

        User::create([
            'first_name'    => 'ORD',
            'last_name'     => 'Admin',
            'email'         =>  'ORD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 4
        ]);

        User::create([
            'first_name'    => 'COA',
            'last_name'     => 'Admin',
            'email'         =>  'COA@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 5
        ]);

        User::create([
            'first_name'    => 'CASHIER',
            'last_name'     => 'Admin',
            'email'         =>  'CASHIER@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 6
        ]);

        User::create([
            'first_name'    => 'ACCOUNTING',
            'last_name'     => 'Admin',
            'email'         =>  'ACCOUNTING@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 7
        ]);

        User::create([
            'first_name'    => 'ARD',
            'last_name'     => 'Admin',
            'email'         =>  'ARD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 8
        ]);

        User::create([
            'first_name'    => 'RD',
            'last_name'     => 'Admin',
            'email'         =>  'RD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 9
        ]);

        User::create([
            'first_name'    => 'CDO_PD',
            'last_name'     => 'Admin',
            'email'         =>  'CDO_PD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 10
        ]);

        User::create([
            'first_name'    => 'CAM_PD',
            'last_name'     => 'Admin',
            'email'         =>  'CAM_PD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 11
        ]);

        User::create([
            'first_name'    => 'BUK_PD',
            'last_name'     => 'Admin',
            'email'         =>  'BUK_PD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 12
        ]);

        User::create([
            'first_name'    => 'LAN_PD',
            'last_name'     => 'Admin',
            'email'         =>  'LAN_PD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 13
        ]);

        User::create([
            'first_name'    => 'MIS_OC_PD',
            'last_name'     => 'Admin',
            'email'         =>  'MIS_OC_PD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 14
        ]);

        User::create([
            'first_name'    => 'MIS_OR_PD',
            'last_name'     => 'Admin',
            'email'         =>  'MIS_OR_PD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 15
        ]);

        User::create([
            'first_name'    => 'TSSD',
            'last_name'     => 'Admin',
            'email'         =>  'TSSD@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 16
        ]);

        User::create([
            'first_name'    => 'BUDGET_UNIT',
            'last_name'     => 'Admin',
            'email'         =>  'BUDGET_UNIT@admin.com',
            'mobile_number' =>  '09263121763',
            'password'      =>  Hash::make('Admin@123#'),
            'role_id'       => 17
        ]);
    }
}
