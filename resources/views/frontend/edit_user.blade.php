@extends('frontend.main_master')
@section('title', 'Edit User Profile')

@section('content')

    <div class="body-content outer-top-xs outer-bottom-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">

                @include('frontend.user_navbar')


                <div class="col-md-8">
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data"
                    class="register-form outer-top-xs">
                    @csrf

                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail2">Name <span>*</span></label>
                        <input type="text" class="form-control unicase-form-control text-input" name="name" id="name"
                            value="{{ $userInfo->name }}" required>
                    </div>
                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                        <input type="email" name="email" class="form-control unicase-form-control text-input" id="email"
                            value="{{ $userInfo->email }}" required>
                    </div>


                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Phone Number <span>*</span></label>
                        <input type="text" name="phone" class="form-control unicase-form-control text-input" id="phone"
                            required value="{{ $userInfo->phone }}">
                    </div>


                    <div class="form-group">
                        <label class="info-title" for="exampleInputEmail1">Profile Photo<span>*</span></label>

                        <input type="file" name="profilephoto" class="form-control unicase-form-control text-input"
                            id="profilephoto" onchange="preview_img()">

                        <img src="{{ !empty(Auth::user()->profile_photo_path) ? url('upload/userProfile/' . Auth::user()->profile_photo_path) : url('public\storage\profile-photos\8o0QK4BIs6SkJESuPhm1N7adEo2eEG7HaIU224Yi.jpg') }}"
                            style="width: 100px; width:100px; border-radius:25%" id="propic">
                    </div>




                    <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
                </form>

                </div>




            </div>
        </div>
    </div>



    <script>
        function preview_img() {
            propic.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
