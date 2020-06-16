<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('roles')->insert([
            [
                'name' => 'Super-Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'User',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Write',
                'guard_name' => 'web'
            ]
        ]);
    }
}
