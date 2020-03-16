<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()){
        $users= auth()->user()->following()->pluck('profiles.user_id');
        $recipes=\App\Recipe::whereIn('user_id',$users)->orderBy('created_at','DESC')->paginate(6);
        return view('home/index',compact('recipes'));
        }else{
        $current='visitor';
        return view('home/index',compact('current'));
        }
    }
}
