@extends('auth._layouts.main')

@section('content')
<div class="wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h2 class="card-header oswald-font-400">{{ __('Register') }}</h2>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 px-md-5">
                                    <div class="mb-3">
                                        <label for="name" class="form-label text-md-end oswald-font-400">{{ __('Name') }}</label>
        
                                        <div class="mb-3">
                                            <input id="name" type="text" class="roboto-font form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="email" class="form-label text-md-end oswald-font-400">{{ __('Email Address') }}</label>
        
                                        <div class="mb-3">
                                            <input id="email" type="email" class="form-control roboto-font @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="password" class="form-label text-md-end oswald-font-400">{{ __('Password') }}</label>
        
                                        <div class="mb-3">
                                            <input id="password" type="password" class="form-control roboto-font @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label text-md-end oswald-font-400">{{ __('Confirm Password') }}</label>
        
                                        <div class="mb-3">
                                            <input id="password-confirm" type="password" class="form-control roboto-font" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
        
                                    <div class="mb-0">
                                        <div class="mb-3 offset-md-12">
                                            <button type="submit" class="btn btn-primary w-100 oswald-font-400">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-0">
                                        <div class="mb-3 offset-md-12 d-flex oswald-font-400" style="justify-content: center;">
                                            <p>I have already an account?  <a href="{{route('login')}}" class="ml-2">Login here</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('page-styles')
<style>
    .wrapper{
        height: 100vh;
        display: flex;
        align-items: center;
    }
    .card-header{
        text-align: center;
    }
    
</style>
@stop