<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class oldtodo extends Controller
{
    public function undoneTodo($id){
        $affected = DB::table('to_do')
              ->where('id', $id)
              ->update(['status' => 'undone']);
              return json_encode($affected);  
    }

    public function listUndoneTodo($gMail){
        $todos=DB::table('to_do')->where(['assigned_mail',$gMail],['status','undone'])->get();
        return json_encode($todos);         
    }
}
