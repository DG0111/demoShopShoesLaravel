<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('permissions')->insert([
            [
                'name' => 'User.Index',
                'guard_name' => 'web'
            ],
            [
                'name' => 'User.Edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'User.Add',
                'guard_name' => 'web'
            ],
            [
                'name' => 'User.Delete',
                'guard_name' => 'web'
            ]
        ]);
    }
}
