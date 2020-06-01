<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Giày Nike',
                'parent_id' => 0,
                'active' => 1,
                'slug' => 'giay-nike'
            ],
            [
                'name' => 'Giày Adidas',
                'parent_id' => 0,
                'active' => 1,
                'slug' => 'giay-adidas'

            ],
            [
                'name' => 'Giày Vans',
                'parent_id' => 0,
                'active' => 1,
                'slug' => 'giay-vans'

            ],
            [
                'name' => 'Giày Converse',
                'parent_id' => 0,
                'active' => 1,
                'slug' => 'giay-converse'
            ],
        ]);
    }
}
