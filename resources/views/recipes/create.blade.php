@extends('layouts.app')

@section('content')
<div class="w-100 row">
<h1 class="col-12 text-center">Create New Recipe</h1>
<div class="col-12 col-md-8 col-lg-6 justify-content-center custom-form-container bg-white shadow border rounded-lg pt-5 pb-4">
    <form action="/p" enctype="multipart/form-data" method="post" autocomplete="off" >
    <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1"  >
                            @csrf        
                            <label for="title" class="font-weight-bold col-form-label text-md-right">Recipe Title</label>
                    
                            <div class="">
                                <input id="title" 
                                        type="text" 
                                        class="form-control custom {{$errors->has('title') ? 'is-invalid' : ''}}" 
                                        name="title" value="{{ old('title') }}" 
                                        autocomplete="title"
                                        placeholder="title"
                                        autofocus>

                                @if($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
    </div>

    <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-3">
                            <label for="ingredient-taker" class="font-weight-bold col-form-label text-md-right">Ingredients</label>

                            <div class="">
                            <ingredient-handler :err="{{$errors->has('ingredient-taker') ? 'is-invalid' : 'noerror'}}" :oldIngredients=" {{ (old('ingredient-taker'))?old('ingredient-taker'):'none' }}" ></ingredient-handler>
                                @if($errors->has('ingredients'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ingredients') }}</strong>
                                    </span>
                                @endif
                            </div>
    </div> 
 
    <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-3">
                            <label for="instructions" class="font-weight-bold col-form-label text-md-right">Instructions</label>
                            <div class="">
                                <textarea id="instructions"rows="10" cols="60"  
                                        class="form-control custom {{$errors->has('instructions') ? 'is-invalid' : ''}}" 
                                        name="instructions" 
                                        value="{{ old('instructions') }}" 
                                        autocomplete="instructions"
                                        autofocus></textarea>

                                @if($errors->has('instructions'))
                               
                                        <strong style="color:red;font-size:12px;">{{ $errors->first('instructions') }}</strong>
                                      
                                @endif
                            </div>
                            
    </div> 
    <div class="w-75 mx-auto pb-1 mt-3">
    <label for="image" class="font-weight-bold col-form-label text-md-right">Recipe Image</label>
    <div>
    <input type="file" class="form-control-file" id="image" name="image" >
                                @if($errors->has('image'))
                                        <strong style="color:red;font-size:12px;">{{ $errors->first('image') }}</i>
                                @endif
    </div>
    </div>
    <div class="w-75 mx-auto pb-2 mt-3">
    <button class="btn btn-primary">Add New Recipe</button>
    </div>
    </form>
</div>            
</div>
    
@endsection
