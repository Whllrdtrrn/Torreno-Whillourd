@extends('frontend._layouts.main')
@section('content')
<div class="profile-wrapper">
    <div class="content container">
       <div class="page-header">
          <div class="content-page-header">
             <h5 class="profile__logo"><i class="fa-regular fa-circle-user"></i></h5>
          </div>
       </div>
       <div class="row">
          <div class="col-md-12">
             <div class="card-body">
                <form action="{{ route('profile.updateProfile') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                   {!!csrf_field()!!}
                   <div class="form-group-item">
                    <input type="hidden" name="id" class="form-control" value="{{ old('id', $editProfile ? $editProfile->id : '') }}">
                    <div class="col-md-6 profile__input">
                            <div class="form-group mt-5 {{$errors->first('name') ? 'has-error' : NULL}}">
                                <label class="oswald-font-300 font-small">Name<span class="text-danger"> *</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $editProfile ? $editProfile->name : '') }}" placeholder="Enter last name">
                                @if($errors->first('name'))
                                <span class="help-block">{{$errors->first('name')}}</span>
                            @endif
                            </div>
                            <div class="form-group mt-3 {{$errors->first('email') ? 'has-error' : NULL}}">
                                <label>Email address<span class="text-danger"> *</span></label>
                                <input type="text" name="email" class="form-control" value="{{ old('email', $editProfile ? $editProfile->email : '') }}" placeholder="Enter email address">
                                @if($errors->first('email'))
                                <span class="help-block">{{$errors->first('email')}}</span>
                                @endif
                            </div> 
                            <div class="button__conatiner mt-3">
                                <a href="{{ route('profile.index') }}" type="reset" class="btn btn-danger cancel me-2">
                                    Cancel
                                </a>
                                {{--<button type="submit" class="btn btn-primary">
                                    Disable your account
                                </button>--}}
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
                                </button>
                            </div>
                    </div>
                                
                   </div>
                   
                
                </form>
             </div>
          </div>
       </div>
    </div>
</div>
@stop
@section('page-styles')
<style>
    .profile-wrapper{
        margin-top: 150px;        
    }
    .content .page-header{
        text-align: center;
    }    
    .profile__input{
        margin: 0 auto;
    }
    .profile__logo{
        font-size: 80px;
    }
    .font-small{
        font-size: 18px;
    }
</style>
@stop