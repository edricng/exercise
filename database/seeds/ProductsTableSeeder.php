<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product 				= new Product;
    	$product->product_name 	= 'Apple Macbook';
    	$product->uuid 			= 'apple-macbook-23093';
    	$product->save();

    	$product 				= new Product;
    	$product->product_name 	= 'Asus Zenfone';
    	$product->uuid 			= 'asus-zenfone-85730';
    	$product->save();

    	$product 				= new Product;
    	$product->product_name 	= 'Samsung Galaxy Note';
    	$product->uuid 			= 'samsung-galaxy-note-52891';
    	$product->save();
    }
}
