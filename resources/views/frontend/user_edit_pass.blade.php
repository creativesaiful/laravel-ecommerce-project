@extends('frontend.main_master')
@section('title', 'Password Change')

@section('content')

    <div class="body-content outer-top-xs outer-bottom-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">

                <div class="col-md-4">

                    <img src="{{!empty(Auth::user()->profile_photo_path) ? url('upload/userProfile/'.Auth::user()->profile_photo_path): url('public\storage\profile-photos\8o0QK4BIs6SkJESuPhm1N7adEo2eEG7HaIU224Yi.jpg')}}"  style="width: 150px; height:150px; border-radius:50%" alt="">

                    <br> <br>
                    <a href="{{route('dashboard')}}" class="btn btn-success">Home</a>




                    <br><br>
                    <a href="{{ route('user.edit') }}" class="btn btn-success">Update Profile</a>


                    <br><br>
                    <a href="{{route('user.change_passwrod')}}" class="btn btn-success">Change Password</a>
                     <br>
                     <br>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button  class="btn btn-danger" onclick="event.preventDefault();
                            this.closest('form').submit();" > Logout </button>
                    </form>

                </div>


                <div class="col-md-8">


 <form method="POST" action="{{route('user.update_password')}}"class="register-form outer-top-xs">
                        @csrf

                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Ole Password <span>*</span></label>
                            <input type="password" name="old_password" class="form-control unicase-form-control text-input"
                                id="old_password" required>

                                @error('old_password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">New Password <span>*</span></label>
                        <input type="password" name="password" class="form-control unicase-form-control text-input"
                            id="password" required>

                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Confirm Password
                            <span>*</span></label>
                        <input type="password"  id="password_confirmation"  class="form-control unicase-form-control text-input" name="password_confirmation" required  >

                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                </form>


                </div>

            </div>
        </div>
    </div>
    @endsection
