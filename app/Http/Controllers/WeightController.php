<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use Webpatser\Uuid\Uuid;
use App\Models\Weight;
use App\Http\Requests\StoreWeightRequest;

class WeightController extends Controller
{
    public function store(StoreWeightRequest $request)
    {
    	$uuid = Uuid::generate(4);

    	$input = [
            'date' 	=> $request->input('date'),
            'max' 	=> $request->input('max'),
            'min' 	=> $request->input('min'),
            'uuid' 	=> $uuid
        ];

        Weight::create($input);

        return redirect('/')->with('messages',alert()->success('Weight has been added'));
    }

    public function show(Request $request, $uuid)
    {
    	$weight = Weight::where('uuid',$uuid)
    			->first();

    	return view('show_weight', ['weight' => $weight]);
    }

    public function update(StoreWeightRequest $request, $uuid)
    {
    	$weight = Weight::where('uuid',$uuid)
    			->first();

    	if ($weight) {
    		$weight->date 	= $request->input('date');
    		$weight->max 	= $request->input('max');
    		$weight->min 	= $request->input('min');
	        $weight->save();
    	}

    	return redirect('/')->with('messages',alert()->success('Weight has been updated!'));
    }

    public function delete(Request $request)
    {
        $uuid = $request->input('uuid');
    	$weight = Weight::where('uuid',$uuid)
    			->first();
    			
    	if ($weight) {
	        $weight->delete();
    	}

    	return redirect('/')->with('messages',alert()->success('Weight has been deleted!'));
    }
}
