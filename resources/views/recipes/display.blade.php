@extends('layouts.app')

@section('content')
    <div class="top-content w-100">
    <div class="container">
    <div class="row justify-content-center" style="margin-bottom:150px;">
       
        <div class="col-3">
                        <img src="/storage/{{$recipe->image}}" class="w-100"/>
        </div>
        <div class="col-9">
                        <div class="display-4">{{$recipe->title}}</div>
                        <div class="pt-2"><strong>Ingredients</strong> </div>
                        
                        @foreach(explode(",",$recipe->ingredients) as $ingredient)
                        <div class="pt-2"><i>{{$ingredient}}</i></div>
                        @endforeach
                        <div class="justify-content-center mt-3">
                        {{$recipe->instructions}}
                        </div>
        </div>
    
    </div>  
    </div>  
              
        
        <div class="container mt-5 ">
        <h5 class="mb-3">Comment Section</h5>
        <div class="{{(Auth::user()) ? 'visible-for-user' : 'not-visible-for-user'}}">
        <comment-input :recipe="{{json_encode($recipe->id)}}"></comment-input>
        </div>
        </div>
    <div class="content" id="comment-container">
   
    @if($recipe->comments()->exists())
            @foreach($recipe->comments as $comment)
           
            <comment-edit-input 
                comment="{{$comment->comm}}"
                v-bind:deletable="{{(Auth::user() && $comment->user_id==Auth::user()->id)? 'true' : 'false'}}" 
                v-bind:editable='{{(Auth::user() && ($comment->user_id==Auth::user()->id || $recipe->user_id==Auth::user()->id)) ? "true" : "false" }}' 
                v-bind:comment_id="{{$comment->id}}" 
                v-bind:recipe_id="{{json_encode($recipe->id)}}"
                user_id="{{$comment->user_id}}"
                profimg="/storage/{{App\User::find($comment->user_id)->profile->profimage}}">
            </comment-edit-input>
            
           
            @endforeach
        @else
            <p>No comment added yet</p>

        @endif
  
    </div>
    </div>
    
@endsection
