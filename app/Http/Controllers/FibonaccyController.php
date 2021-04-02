<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FibonaccyController extends Controller
{
    public function fibonaccy($n = 5){
        $fibo=[];
        for ($i = 0 ; $i <= $n ; $i++) { 
            if($i == 0){
                $fibo[$i] = 0;
            }elseif($i == 1){
                $fibo[$i] = 1;
            }else {
                $fibo[$i] = $fibo[$i-1] + $fibo[$i-2];
            }
        }
        
        return ['result' => $fibo[$n]];
    }

    public function sumFibo(Request $request){
        $result = [];
        $n = 1;
        $is_worth = false;

        if(intval($request->number1) == intval($request->number2)){
            $is_worth = true;
        }

        if(intval($request->number1) > intval($request->number2)){
            $n = intval($request->number1);
        }else{
            $n = intval($request->number2);
        }

        $sum = 0 ;
        for ($i=0; $i <= $n ; $i++) { 
            if($i == 0 ){
                $result[$i] = 0;
            }
            elseif($i == 1 ){
               $result[$i] = 1;
            }else {
                $result[$i] = $result[$i-1] + $result[$i-2];
            }
            
            if($is_worth == true){
                $sum = $result[$i] * 2;
            }else{
                if($i === intval($request->number2) || $i === intval($request->number1)){
                    $sum = $sum +  $result[$i];
                }
            }
        }

        return ['result' => $sum];
    }
}


