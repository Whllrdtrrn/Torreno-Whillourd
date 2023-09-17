@extends('auth._layouts.main')

@section('content')
<div class="wrapper">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="card-header oswald-font-600">Login</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 oswald-font-400">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                 @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 px-md-5">
                                <div class="mb-3">
                                    <label for="email" class="oswald-font-300 form-label text-md-end">{{ __('Email Address') }}</label>
                                    <div class="mb-3">
                                        <input id="email" type="email" class="roboto-font form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback oswald-font-400" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="mb-3">
                                    <label for="password" class="col-form-label oswald-font-300 text-md-end">{{ __('Password') }}</label>
        
                                    <div class="mb-3">
                                        <input id="password" type="password" class="roboto-font form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback oswald-font-400" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class=" mb-3">
                                    <div class="">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label oswald-font-300" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mb-0">
                                    <div class="col-md-12 mb-0 text-center">
                                        <button type="submit" class="oswald-font-300 btn btn-primary w-50">
                                            {{ __('Login') }}
                                        </button>

                                    </div>
                                </div>
                                <hr>
                                <div class="row mb-0">
                                    <div class="col-md-12 mb-0 text-center oswald-font-400">
                                        Already have an account? 
                                        <a href="{{route('register')}}">
                                           Register Now
                                        </a>

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