@extends('frontend.main_master')
@section('title', 'Password Change')

@section('content')

    <div class="body-content outer-top-xs outer-bottom-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                @include('frontend.user_navbar')


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
