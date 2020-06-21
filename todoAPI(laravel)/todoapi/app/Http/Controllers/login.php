<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class login extends Controller
{
    public function sign_in($mail,$pass){
        $user=DB::table('person')->where('mail',$mail)->where('password',$pass)->get();
        //$data=json_encode($user);
        //return view('signin',$data);
        return "".json_encode($user);
    }
    public function sign_up($mail,$pass,$comp,$level){
        $id = DB::table('person')->insertGetId(
            [
            'mail' => $mail, 
            'password' =>$pass,
            'firm'=>$comp,
            'loa'=>$level
            ]            
        );
        return json_encode($id);
        
    }
}
