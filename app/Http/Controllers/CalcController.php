<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalcController extends Controller
{
    function add(Request $request){
        // dd([$request->x  ,$request->y]);
        // dd([$n1 ,$n2]);
        // dd( $request->x);
        // dd( $request->y);

        echo $request->x +  $request->y + $request->z;

    }

    function show(){
        // return view("my_calc")->with("sum_result" , $rslt);
        return view("my_calc");
    }

    function sum(Request $request){
        // dd($request->all());
        // echo $request->n1 + $request->n2;
        // echo $request->input("n1") + $request->input("n2");

        $rslt =$request->n1 + $request->n2;
        // return view("my_calc" ,["sum_result" =>$rslt]);
        return view("my_calc")->with("sum_result" , $rslt);
        // return redirect("/show" )->with("sum_result" , $rslt);
    }
}
