@extends('layouts.app')

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-8 col-sm-6 col-md-5 col-lg-3">
                                    <img src="{{$user->profile->profimage ? '/storage/'.$user->profile->profimage : '/png/avatar.png'}}" class="w-100"/>
        </div>
        <div class="col-8 col-sm-6 col-md-7 col-lg-8">
                                    <div class="container">
                                        <div class="row">
                                    <div class="col-sm-12 col-sm-12" style="font-size:2em;">{{ $user->username }}</div>
                                    <div class="col-sm-12  col-sm-12">
                                    @if(Auth::user() && $user->id==Auth::user()->id)
                                    <a href="/profile/{{$user->id}}/edit">
                                    <button class="btn btn-primary mt-3 ml-2" >Edit Profile</button>
                                        </a> 
                                    </div>       
                                    @else
                                    <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>
                                    @endif
                                        </div>
                                    </div>
                                    <div class="container w-100">
                                    <div class="row">
                                    <div class="p-2 col-sm-12 col-md-4 col-lg-3"><strong>{{$recipeCount}}</strong> recipes</div>
                                    <div class="p-2 col-sm-12 col-md-4 col-lg-3"><strong>{{$following}}</strong> following</div>
                                    <div class="p-2 col-sm-12 col-md-4 col-lg-3"><strong>{{$followers}}</strong> followers</div>
                                    </div>
                                    </div>
                                    <div class="display:6 "><strong class="border-bottom border-secondary">{{ $user->profile->title }}</strong></div>
                                    <div class="w-100 justify-content-center mt-3">
                                    {{ $user->profile->description }}
                                    </div>
        </div>
    </div> 
</div>
    <div class="mt-5 pb-4 mb-5 w-75 container">
            <div class="row">
                    @foreach($recipes as $recipe)
                <div class="col-12 col-md-6 col-lg-4 mb-3 ">
                    <div class="w-100 h-10 overflow-hidden">  
                    <a class="text-dark" href="/p/display/recipe/{{ $user->id }}/{{ $recipe->id }}">
                    
                    <div class="article w-100 bg-secondary" style=
                                        "background-image:url('/storage/{{$recipe->image}}');
                                         background-size:cover;
                                         background-position:center;
                                         height:200px;">
                                <span>{{$recipe->title}}</span>
                    </div>
                    
                    </a>
                    </div>
                </div>
                    @endforeach
            </div>
            <div class="mx-auto mt-3">{{$recipes->links()}}</div>
    </div>
                
              
   
    
@endsection
