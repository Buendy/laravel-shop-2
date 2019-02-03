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
        $categories = factory(\App\Category::class, 10)->create();
        $categories->each(function($c){
            $products =factory(\App\Product::class, 20)->make();
            $c->products()->saveMany($products);
            $products->each(function($p){
                $images = factory(\App\ProductImage::class, 5)->make();
                $p->images()->saveMany($images);
            });
        });
    }
}
