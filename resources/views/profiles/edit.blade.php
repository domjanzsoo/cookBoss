@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="text-center">Edit Profile</h1>
@if($errors) 
{{var_dump($errors)}}
@endif
<div class="custom-form-container bg-white shadow border rounded-lg pt-5 pb-4">
    <form action="/profedit/{{$user->id}}" enctype="multipart/form-data" method="post">
    <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1"  >
                            @csrf
                            @method('PATCH')       
                            <label for="title" class="font-weight-bold col-form-label text-md-right">Title</label>
                    
                            <div class="">
                                <input id="title" 
                                        type="text" 
                                        class="form-control custom {{$errors->has('title') ? 'is-invalid' : ''}}" 
                                        name="title" value="{{ old('title') ?? $user->profile->title }}" 
                                        autocomplete="title"
                                        autofocus>

                                @if($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
    </div>

    <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-3">
                            <label for="url" class="font-weight-bold col-form-label text-md-right">Url</label>

                            <div class="">
                                <input id=url 
                                        type="text" 
                                        class="form-control custom {{$errors->has('ingredient-taker') ? 'is-invalid' : ''}}" 
                                        name="url" value="{{ old('url') ?? $user->profile->url }}"  
                                        autocomplete="url"
                                        autofocus>
                                @if($errors->has('url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
    </div> 
 
    <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-3">
                            <label for="description" class="font-weight-bold col-form-label text-md-right">Description</label>
                            <div class="">
                                <textarea id="description"
                                        rows="10"
                                        cols="60"  
                                        class="form-control custom {{$errors->has('description') ? 'is-invalid' : ''}}" 
                                        name="description" 
                                        value="{{old('description') }}" 
                                        autocomplete="description"
                                        autofocus>{{old('description') ?? $user->profile->description}}</textarea>

                                @if($errors->has('description'))
                               
                                        <strong style="color:red;font-size:12px;">{{ $errors->first('description') }}</strong>
                                      
                                @endif
                            </div>
                            
    </div> 
    <div class="w-75 mx-auto pb-1 mt-3">
    <label for="profimage" class="font-weight-bold col-form-label text-md-right">Profile Image</label>
    <div>
    <input type="file" class="form-control-file" id="image" name="profimage" >
                                @if($errors->has('profimage'))
                                        <strong style="color:red;font-size:12px;">{{ $errors->first('profimage') }}</i>
                                @endif
    </div>
    </div>
    <div class="w-75 mx-auto pb-2 mt-3">
    <button class="btn btn-primary">Update Profile</button>
    </div>
    </form>
</div>            
</div>
    
@endsection
