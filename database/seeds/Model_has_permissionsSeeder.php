<?php

use Illuminate\Database\Seeder;

class Model_has_permissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('model_has_permissions')->insert([
            [
                'permission_id' => '1',
                'model_type' => 'App\User',
                'model_id' => '1'
            ],
            [
                'permission_id' => '2',
                'model_type' => 'App\User',
                'model_id' => '1'
            ],
            [
                'permission_id' => '3',
                'model_type' => 'App\User',
                'model_id' => '1'
            ],
            [
                'permission_id' => '4',
                'model_type' => 'App\User',
                'model_id' => '1'
            ]
        ]);
    }
}
