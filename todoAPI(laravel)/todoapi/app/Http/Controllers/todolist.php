<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class todolist extends Controller
{
    public function listAllTodo($gMail){
        $todos=DB::table('to_do')->where(['assigned_mail',$gMail],['status','undone'])->get();
        return json_encode($todos);       
    }

    public function newTodo($creator,$assigned,$title,$content,$deadline){
        $id = DB::table('to_do')->insertGetId(
            [
            'creator_mail' => $creator, 
            'assigned_mail' =>$assigned,
            'title'=>$title,
            'content'=>$content,
            'deadline'=>$deadline,
            'status'=>'undone'
            ]            
        );
        return json_encode($id);        
    }

    public function doneTodo($id){
        $affected = DB::table('to_do')
              ->where('id', $id)
              ->update(['status' => 'done']);
              return json_encode($affected);       
    }

    
}
