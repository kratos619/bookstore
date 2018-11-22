<?php

use Illuminate\Database\Seeder;

class ProductssTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 30)->create();
    }
}
