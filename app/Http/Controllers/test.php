<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\validateForm;

class test extends Controller
{
    //
    public function method1($username){
        //echo "Bonjour, ".$username;
        return view('exo',[
            'username'=>$username,
            'age'=> 16
        ]);
    }
    public function store(validateForm $request){
        //echo "Hey";
        //var_dump($request);
        $validated=$request->validated();
        if($validated){
            echo "Yessss!";
        }else{
            return redirect()->back();
        }   
    }
}
