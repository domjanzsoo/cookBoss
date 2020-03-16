<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class RecipesController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }

    public function create(){
        return view('recipes/create');
    }

    public function store(){
        $data=request()->validate([
            'title'         =>'required',
            'ingredients'   =>'',
            'instructions'  =>'required',
            'image'         =>['required','image']
        ]);

        $imagePath=request('image')->store('uploads','public');

        auth()->user()->recipes()->create([
            'title'         =>$data['title'],
            'ingredients'   =>$data['ingredients'],
            'instructions'  =>$data['instructions'],
            'image'         =>$imagePath
        ]);
        
        return redirect('/profile/'.auth()->user()->id);
    }

    public function display($user,$recipe){
        $rec=User::find($user)->recipes()->find($recipe);
       
        return view('recipes/display',[

                'recipe'    =>$rec,
                'current'   =>'recipe'

        ]);
    }
}
