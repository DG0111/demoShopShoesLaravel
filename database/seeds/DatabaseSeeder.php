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
         $this->call(UserSeeder::class);
         $this->call(ProductSeeder::class);
         $this->call(PermissionSeeder::class);
         $this->call(RoleSeeder::class);
         $this->call(Model_has_permissionsSeeder::class);
         $this->call(Model_has_rolesSeeder::class);
         $this->call(Role_has_permissionsSeeder::class);

    }
}
