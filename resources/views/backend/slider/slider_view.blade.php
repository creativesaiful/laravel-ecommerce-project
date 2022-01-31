@extends('admin.admin_master')

@section('title', 'Slider View')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">






            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Slider</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Slider Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($allSlide as $allSlide)
                                        <tr>

                                            <td><img style="width: 150px; height:70px"
                                                    src="{{ asset($allSlide->slider_img) }}" alt=""></td>

                                            <td>
                                                @if ($allSlide->title == null)
                                                    <span class="badge badge-pill badge-danger"> No Title </span>
                                                @else
                                                    {{ $allSlide->title }}
                                                @endif

                                            </td>
                                            <td>
                                                @if ($allSlide->description == null)
                                                    <span class="badge badge-pill badge-danger"> No Descriptin </span>
                                                @else
                                                    {{ $allSlide->description }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($allSlide->status == 1)
                                                    <span class="badge badge-pill badge-success"> Active</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger"> InActive</span>
                                                @endif

                                            </td>

                                            <td>
                                                <a href="{{ route('slider.edit',$allSlide->id) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>


                                                <a href="{{ route('slider.delete',$allSlide->id) }}"
                                                    class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></a>

                                                @if ($allSlide->status == 1)
                                                    <a href="{{ route('slider.inactive', $allSlide->id) }}"
                                                        class="btn btn-danger btn-sm" title="Inactive Now"><i
                                                            class="fa fa-arrow-down"></i> </a>
                                                @else
                                                    <a href="{{ route('slider.active', $allSlide->id) }}"
                                                        class="btn btn-success btn-sm" title="Active Now"><i
                                                            class="fa fa-arrow-up"></i> </a>
                                                @endif


                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>


            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Slide</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Slider Title <span class="text-danger">*</span></h2>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">

                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>


                            <div class="form-group">
                                <h5>Slider description<span class="text-danger">*</span> </h5>
                                <input type="text" name="description" class="form-control"
                                    value="{{ old('description') }}">

                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>

                            <div class="form-group">
                                <h5>Slide Image <span class="text-danger">*</span> </h5>
                                <input type="file" name="slider_img" class="form-control" id="brand_image"
                                    onchange="previewBrandImg()">
                                <span>For better image size should be 870*370 px</span> <br>

                                @error('slider_img')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group d-none" id="imgDev">
                                <div class="controls">
                                    <img style="width: 300px; height:300px" id="brandUpImg">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add Brand">
                            </div>






                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <script>
        function previewBrandImg() {
            $(imgDev).removeClass('d-none');

            brandUpImg.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
