@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-7 col-lg-5">
            <div class="card shadow" style="opacity:0.9;-moz-opacity:0.9;-webkit-opacity:0.9;">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body pb-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-3">
                            <label for="email" class="font-weight-bold col-form-label text-md-right">Email</label>

                            <div class="">
                                <input id="email" 
                                        type="email" 
                                        class="form-control custom @error('email') is-invalid @enderror" 
                                        name="email" value="{{ old('email') }}" 
                                        autocomplete="email"
                                        placeholder="Email address"
                                        autofocus>
                            </div>

                                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                        
                        </div>
                

                        <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-3 mb-5">
                            <label for="password" class="font-weight-bold col-form-label text-md-right">Password</label>

                            <div class="">
                                <input id="password" 
                                        type="password" 
                                        class="form-control custom @error('password') is-invalid @enderror" 
                                        name="password" 
                                        autocomplete="current-password"
                                        placeholder="Password"
                                        autofocus>
                            </div>

                                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                            </div>
                            <div class="w-75 mx-auto mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="w-75 mx-auto">
                          
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
