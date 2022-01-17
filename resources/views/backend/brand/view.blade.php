@extends('admin.admin_master')

@section('title', 'Brand View')

@section('content')
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Data Tables</h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Tables</li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="row">






            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand En</th>
                                        <th>Brand Hin</th>
                                        <th>Image</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($brandinfo as $brandinfo)
                                        <tr>
                                            <td>{{ $brandinfo->brand_name_en }}</td>
                                            <td>{{ $brandinfo->brand_name_hin }}</td>
                                            <td><img style="width: 70px; height:70px"
                                                    src="{{ asset($brandinfo->brand_image) }}" alt=""></td>
                                            <td>

                                                <a href="{{ route('brand.edit', $brandinfo->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{route('brand.delete',$brandinfo->id)}}" class="btn btn-danger">Delete</a>

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
                        <h3 class="box-title">Add New Brand</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Brand Name English <span class="text-danger">*</span></h2>
                                    <input type="text" name="brand_name_en" class="form-control"
                                        value="{{ old('brand_name_en') }}">

                                    @error('brand_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>


                            <div class="form-group">
                                <h5>Brand Name hindi<span class="text-danger">*</span> </h5>
                                <input type="text" name="brand_name_hin" class="form-control"
                                    value="{{ old('brand_name_hin') }}">

                                @error('brand_name_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>

                            <div class="form-group">
                                <h5>Brand Image <span class="text-danger">*</span> </h5>
                                <input type="file" name="brand_image" class="form-control" id="brand_image" onchange="previewBrandImg()">
                                <span>For better image size should be 300*300 px</span> <br>

                                @error('brand_image')
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
