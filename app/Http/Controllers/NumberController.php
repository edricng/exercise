<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NumberController extends Controller
{
    public function generate(Request $request)
    {
    	$number = $request->input('number');

        for ($x = $number; $x > 0; $x--) {
            echo $x-1;
            echo $x-1;
            for ($i = $x+1; $i >= $x+1; $i--) { 
                for ($j=0; $j < $x; $j++) { 
                    echo $i;
                }
            }
            echo "<br>";
        }

        echo "<a href='/'>Back To Home</a>"; 
    }
}
