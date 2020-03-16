<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(){
        $data=request()->validate([
            'recipe'    =>'required',
            'comment'   =>'required'
        ]);
        
        \App\Recipe::find($data['recipe'])->comments()->save(new \App\Comment([
            'comm'      =>$data['comment'],
            'user_id'   =>auth()->user()->id
        ]));    

        return 'Comment added successfully';  
    }

    public function update(){
        $data=request()->validate([
            'commid'    =>'required',
            'comment'   =>'requred'
        ]);

        $comment=\App\Comment::find($data['commid']);
        $comment->comm=htmlentities($data['comment']);
        $comment->save();
            return 'Comment updated successfully';
      
        
    }

    public function delete(){
        $data=request()->validate([
            'commid'    =>'required'
        ]);
        $comment=\App\Comment::find($data['commid']);
        $comment->delete();
        return 'Comment deleted';
    }
}
