<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProfilesController extends Controller
{
    public function index(\App\User $user){
        $follows=(auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        $current='none';
        $recipeCount=Cache::remember('recipes.count.' .$user->id, now()->addSeconds(30),function() use($user){
            return $user->recipes->count();
        });

        $following=Cache::remember('following.count.' .$user->id, now()->addSeconds(30),function() use($user){
            return $user->following()->count();
        });

        $followers=Cache::remember('followers.count.' .$user->id, now()->addSeconds(30),function() use($user){
            return $user->profile->followers->count();
        });

        $page=(request()->has('page')) ? request()->query('page') : 1;
        $recipes=Cache::remember('usersrecipe.count'.$user->id .'_page_' . $page, now()->addSeconds(30), function() use($user){
            return $user->recipes()->orderBy('created_at','DESC')->paginate(6);
        });

        return view('profiles/index', compact('user','follows','current','recipeCount','following','followers','recipes'));
    }

    public function edit(\App\User $user){
        $current='none';
        $this->authorize('update',$user->profile);

        return view('profiles/edit',compact('user','current'));
    }

    public function update(User $user){
        $this->authorize('update',$user->profile);
     
        $data=request()->validate([
            'title'         =>'required',
            'url'           =>'url',
            'description'   =>'required',
            'profimage'     => 'image'
        ]);

        
       
        if(request('profimage')){

            $imagePath=request('profimage')->store('uploads','public');
            auth()->user()->profile->update(array_merge(
                $data,
                ['profimage'=>$imagePath]
            ));
            

        }else{

            auth()->user()->profile->update($data);

        }
        return redirect("/profile/{$user->id}");
       
    }
}
