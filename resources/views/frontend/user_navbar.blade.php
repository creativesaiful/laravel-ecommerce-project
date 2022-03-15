<div class="col-md-2">

    <img src="{{ !empty(Auth::user()->profile_photo_path)? url('upload/userProfile/' . Auth::user()->profile_photo_path): url('public\storage\profile-photos\8o0QK4BIs6SkJESuPhm1N7adEo2eEG7HaIU224Yi.jpg') }}"
        style="width: 150px; height:150px; border-radius:50%" alt="">

    <br> <br>
    <a href="{{ route('dashboard') }}" class="btn btn-success">Home</a>

    <br> <br>
    <a href="{{ route('my.orders') }}" class="btn btn-success">Order</a>


    <br><br>
    <a href="{{ route('user.edit') }}" class="btn btn-success">Update Profile</a>


    <br><br>
    <a href="{{ route('user.change_passwrod') }}" class="btn btn-success">Change Password</a>

    <br><br>




    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger" onclick="event.preventDefault();
        this.closest('form').submit();"> Logout </button>
    </form>

</div>
