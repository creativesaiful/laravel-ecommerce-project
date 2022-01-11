@extends('admin.admin_master')


@section('content')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">


                    <!-- Profile Image -->

                    <!-- /.box -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" >
                            <h3 class="widget-user-username">Name : {{$adminData->name}}</h3>
                            <h6 class="widget-user-desc">Email : {{$adminData->email}}</h6>

                            <a href="{{route('admin.edit_profile')}}" type="button" class="btn btn-info mb-5 float-right">Edit Profile</a>
                        </div>
                        <div class="widget-user-image">
                            <img class="rounded-circle" style="width: 90px; height:90px" src="{{!empty($adminData->profile_photo_path)? url('upload/adminProfile/'.$adminData->profile_photo_path):url('backend/images/admin/avatar-1.png') }}">
                        </div>




                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">12K</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">550</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">158</h5>
                                        <span class="description-text">TWEETS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>





                </div>
            </div>
        </section>
    </div>





@endsection
