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

        return redirect('/')->with('messages',alert()->success('Product has been added'));
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

        return redirect('/')->with('messages',alert()->success($quantity.' '.$product->product_name.' has been added to your cart'));
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

        $remove_message = session('remove_message');
        if ($remove_message) {
            session()->flush();
            return redirect('/view-cart')->with('messages',alert()->success($remove_message));
        }else{
            return view('cart', ['carts' => $carts]);
        }
    }

    public function removeItem(Request $request, $uuid)
    {
        if(isset($_COOKIE[$uuid])){
            $product    = Product::where('uuid',$uuid)
                        ->first();
            unset($_COOKIE[$uuid]);
            setcookie($uuid, null, -1, '/');
            session(['remove_message' => $product->product_name.' has been removed from your cart']);
            return $this->showCart();
        }
    }
}
