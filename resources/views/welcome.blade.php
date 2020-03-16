@extends('layouts.app')
@section('content')
        <div class="flex-center position-ref full-height w-100 h-100">
       
            <div class="content">
                @if(Auth::user())
                <h3 class="text-center mx-auto custom-color" style="margin-top:100px;font-size:7vw;">{{Auth::user()->username}}, Welcome Back.</h3>
            
                @else
                    <h3 class="text-center mx-auto custom-color" style="margin-top:100px;font-size:7vw;">Explore Cuisines</h3>
            
                @endif
            </div>
@endsection
