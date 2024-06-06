<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Http\Requests\validateForm;
use Illuminate\Support\Facades\Mail;

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
    public function bar(){
        Mail::to('test@gmail.com')->send(new TestMail());
        return redirect()->back();
    }
}
