@extends('frontend._layouts.main')
@section('content')

    <div class="wrapper__profile">
        <div class="container">
                <div class="header__container">
                    <i class="fa-regular fa-circle-user"></i>
                  </div>
                  <div class="body__container mt-0 mb-4">
                        <div class="form-group mt-5">
                            <h3 class="oswald-font-300 font-small">Name<span class="text-danger"> *</span></h3>
                            <p class="oswald-font-600 text-uppercase">{{ $profile[0]->name }}</p>
                        </div>
                        <div class="form-group mt-3">
                            <h3 class="oswald-font-300 font-small" >Email address<span class="text-danger"> *</span></h3>
                            <p class="oswald-font-600 text-uppercase">{{ $profile[0]->email }}</p>
                        </div> 
                  </div>  
                  <div class="footer__container">
                    <div class="button__conatiner mt-5">
                        <a href="{{ route('book.index') }}" type="reset" class="btn btn-danger cancel me-2">
                                    Back
                        </a>
                        <a href="{{ route('profile.disable_account') }}" class="btn btn-secondary">
                            Disable your account
                        </a>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                            Edit Profile
                        </a>
                    </div>
                  </div>  
        </div>
    </div>

@stop
@section('page-styles')
<style>
    .wrapper__profile{
        margin-top: 100px;
    }
    .header__container{
        text-align: center;
        font-size: 50px;

    }
    .body__container{
        text-align: center;
        font-size: 30px;
        
    }
    .footer__container{
        text-align: center;

    }
    .font-small{
        font-size: 20px
    }
</style>
@stop