<?php

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
        $password = Hash::make('123456');
        \Illuminate\Support\Facades\DB::table('users')->insert([
            [
                'full_name' => 'Pham Van Khai',
                'address' => 'Tốt Động - Chương Mỹ - Hà Nội',
                'state' => 1,
                'email' => 'khai123@gmail.com',
                'password' => $password,
                'role' => 2
            ],
            [
                'full_name' => 'Ngo Van Long',
                'address' => 'Tốt Động - Chương Mỹ - Hà Nội',
                'state' => 1,
                'email' => 'admin@gmail.com',
                'password' => $password,
                'role' => 1
            ]
        ]);
    }
}
