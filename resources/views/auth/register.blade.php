@extends('layouts.app')

@section('content')
<div class="logincont w-100 h-100 pt-2">
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <div class="card" style="opacity:0.9;-moz-opacity:0.9;-webkit-opacity:0.9;">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-1">
                            <label for="name" class="font-weight-bold col-form-label text-md-right">{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control custom @error('name') is-invalid @enderror" placeholder="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-1">
                            <label for="username" class="font-weight-bold col-form-label text-md-right">{{ __('User Name') }}</label>
                                <input id="username" type="username" class="form-control custom @error('username') is-invalid @enderror" name="username" placeholder="username" value="{{ old('username') }}" autocomplete="username">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-1">
                            <label for="email" class="font-weight-bold col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="email" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-1">
                            <label for="password" class="font-weight-bold col-form-label text-md-right">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control custom @error('password') is-invalid @enderror" name="password" placeholder="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="w-75 mx-auto border-bottom border-groove border-secondary pb-1 mt-1">
                            <label for="password-confirm" class="font-weight-bold col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control custom" name="password_confirmation" placeholder="re-type password" required autocomplete="new-password">
                        </div>

                        <div class="w-75 border-secondary pb-1 mt-3 mb-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
