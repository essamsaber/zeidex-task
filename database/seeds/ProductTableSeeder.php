<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \Illuminate\Support\Facades\DB::table('products')->truncate();

       $faker = \Faker\Factory::create();
        for($i = 0; $i < 30; $i++) {
            $category_id = \App\Category::inRandomOrder()->first()->id;
            $product = \App\Product::create([
                'category_id' => $category_id,
                'name' => $faker->sentence(rand(2,4), true),
                'price' => $faker->numberBetween(100, 1000)
            ]);

            $product->images()->create(['path' => $faker->imageUrl()]);
        }

    }
}
