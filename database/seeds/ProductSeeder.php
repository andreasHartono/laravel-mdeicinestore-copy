<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'Masker CN95',
            'product_price' => 10000,
            'category_id' => 1
        ]);

        DB::table('products')->insert([
            'product_name' => 'Hand Sanitizer',
            'product_price' => 15000,
            'category_id' => 1
        ]);
    }
}
