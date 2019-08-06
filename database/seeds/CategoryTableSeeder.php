<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('categories')->truncate();

        $categories = ['Smartphones', 'Laptops', 'Watches'];

        foreach ($categories as $category) {
            \App\Category::create(['name' => $category]);
        }

    }
}
