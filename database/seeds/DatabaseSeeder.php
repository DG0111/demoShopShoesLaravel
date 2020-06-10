<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategorySeeder::class);
         $this->call(RoleSeeder::class);
         $this->call(PmsSeeder::class);
         $this->call(Role_PmsSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(ProductSeeder::class);
    }
}
