@extends('layouts.app')

@section('content')
@if(Auth::user())
<div class="container w-75 custom-sizer mx-auto">
<div class="row ">
@foreach($recipes as $recipe)
<div class=" col-sm-12 col-md-5 col-lg-3 ml-4 mb-2 bg-white p-3 " style="
           box-sizing:border-box;
            opacity:0.9;
            -moz-opacity:0.9;
            -webkit-opacity:0.9;
            border:1px groove;
            border-radius:13px;
            ">

                                                <div class="row  pb-2" style="height:110px;">
                                                            <div class="col-4 col-xs-6 col-sm-3 col-md-4 col-lg-4 h-100 " 
                                                                    style="background-image:url({{($recipe->user->profile->profimage) ? '/storage/'.$recipe->user->profile->profimage : '/png/avatar.png' }});
                                                                            background-position:top;
                                                                            background-size:cover;
                                                                            background-repeat:no-repeat;
                                                                            ">
                                                            </div>

                                                            <div class=" col-7 col-xs-6 col-sm-6 col-md-8 col-lg-8 text-center h-100">
                                                            <a class="link" href="/p/display/recipe/{{$recipe->user->id}}/{{$recipe->id}}">
                                                                    <span style="font-size:12px"><strong>{{$recipe->title}}</strong></span>
                                                            </a>
                                                                    <div class="mt-1 w-100 " style="font-size:10px"><a class="link" href="/profile/{{$recipe->user->id}}">{{$recipe->user->name}}</a></div>
                                                            </div>

                                                </div>
                                                <div class="row w-100"
                                                                        style="
                                                                        height:90px;
                                                                        background-image:url({{($recipe->image) ? '/storage/'.$recipe->image : 'jpg/emptyplate.jpg'}});
                                                                        background-position:center;
                                                                        background-size:cover;
                                                                        position-repeat:no-repeat;
                                                                        ">

                                                            <div class="col"></div>
                                                </div>

</div>

@endforeach
</div>
<div class="w-100 mx-auto">
    {{$recipes->links()}}
    
</div>
</div>
@else
<h2 class="w-100 text-center">Search for something new to cook</h2>
<div class="search-container d-flex justify-content-center w-50 h-100 mx-auto">
<search-input></search>
</div>
@endif
@endsection