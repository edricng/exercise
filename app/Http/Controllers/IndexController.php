<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;

use App\Models\Weight;
use App\Models\Product;

class IndexController extends Controller
{
    public function index(Request $request)
    {
    	$average_max = 0;
    	$average_min = 0;
    	$average_variance = 0;

    	$weights 	= Weight::orderby('date','desc')
    				->get();

    	if (count($weights) > 0) {
    		$average_max 	= Weight::avg('max');
    		$average_min 	= Weight::avg('min');
    		
    		foreach ($weights as $weight) {
    			$average_variance = $average_variance + ($weight->max - $weight->min);
    		}
    		$average_variance = $average_variance/count($weights);
    	}

    	$products 	= Product::orderby('created_at','desc')
    				->get();

        return view('index', [	'weights' 		=> $weights,
        						'average_max' 	=> $average_max,
        						'average_min' 	=> $average_min,
        						'average_variance'=>$average_variance,
        						'products' 		=> $products]);
    }
}
