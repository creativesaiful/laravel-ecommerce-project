@extends('admin.admin_master')

@section('title', 'Ecommece Site')
@section('content')
    <div class="container-full">

        <!-- Main content -->

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Form Validation</h4>

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
      <form method="POST" action="{{route('admin.store_profile')}}" enctype="multipart/form-data" >

        @csrf
                                <div class="row">
                                    <div class="col-6">

                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
    <input type="email" name="email" class="form-control" required value="{{ $editData->email }}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Password Input <span class="text-danger">*</span></h5>
                                            <div class="controls">
       <input type="password" name="password" id="password" class="form-control" required >

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Profile Photo <span class="text-danger">*</span></h5>
                                            <div class="controls">
 <input type="file" name="profilephoto" class="form-control" onchange="preview()">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-6">

                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
        <input type="text" name="name" class="form-control" required value="{{ $editData->name }}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
  <input type="password" name="password2" id="password2" class="form-control" required >

  <h6 class="text-danger" id="passerror"></h6 >

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="controls">
                                                <img class="rounded-circle" id="upimg" style="width: 100px; height:100px"
                                                    src="{{ !empty($editData->profile_photo_path) ? url('upload/adminProfile/'.$editData->profile_photo_path) : url('backend/images/admin/avatar-1.png') }}">
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>



    </div>




    <script>
       $(document).ready(function () {
           $('#password2').keyup(function (e) {
                var pass1 = $("#password").val();
                var pass2 =  $("#password2").val();

                if(pass2!==pass1){
                    $("#passerror").html('Pass did not matched')
                }else{
                    $("#passerror").html('')
                }
           });
        });

        function preview() {
            upimg.src = URL.createObjectURL(event.target.files[0]);
        }


    </script>


@endsection
