<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Webpatser\Uuid\Uuid;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Cookie;

class ProductController extends Controller
{
    public function store(StoreProductRequest $request)
    {
    	$uuid = str_replace(' ', '-', $request->input('product_name'));
    	$uuid = strtolower($uuid).'-'.rand(1,99999);

    	$input = [
            'product_name' 	=> $request->input('product_name'),
            'uuid' 			=> $uuid
        ];

        Product::create($input);

        return redirect('/')->with('product_message',"Success to add product");
    }

    public function cart(Request $request)
    {
    	$uuid 		= $request->input('uuid');
    	$quantity 	= $request->input('quantity');

    	$product 	= Product::where('uuid',$uuid)
    				->first();
    	
    	if(!isset($_COOKIE[$uuid])){
    		setcookie($uuid, $quantity);
    	}else{
    		$quantity_cart = $_COOKIE[$uuid];
			$quantity_cart = $quantity_cart + $quantity;
			setcookie($uuid, $quantity_cart);
    	}

        return redirect('/')->with('product_message',"Success add to cart");
    }

    public function showCart()
    {
    	$carts = array();
    	$products 	= Product::select('product_name','uuid')
    				->get();

    	foreach ($products as $product) {
    		if(isset($_COOKIE[$product->uuid])){
                $item_cart = new \stdClass();
                $item_cart->product_name = $product->product_name;
                $item_cart->quantity = $_COOKIE[$product->uuid];
                $item_cart->uuid = $product->uuid;
                $carts[] = $item_cart;
    		}
    	}

    	return view('cart', ['carts' => $carts]);
    }

    public function removeItem(Request $request, $uuid)
    {
        if(isset($_COOKIE[$uuid])){
            unset($_COOKIE[$uuid]);
            setcookie($uuid, null, -1, '/');
            return $this->showCart();
        }
    }
}
