@extends('admin.admin_master')

@section('title', 'Catagory View')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">




            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Sub Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Catagory Name</th>
                                        <th>Sub Category English</th>
                                        <th>Sub Category Hindi</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subcataInfo as $subcataInfo)
                                        <tr>
                                            <td>{{ $subcataInfo->category_id }}</td>
                                            <td>{{ $subcataInfo->subcata_name_en }}</td>
                                            <td>{{ $subcataInfo->subcata_name_hin }}</td>

                                            <td>
                                            <a href="{{ route('subcata.edit', $subcataInfo->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ route('subcata.delete', $subcataInfo->id) }}"
                                                class="btn btn-danger delete">Delete</a>

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
                        <h3 class="box-title">Add New Sub Category</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <form action="{{ route('subcata.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <h5>Select Catagory <span class="text-danger">*</span></h5>

                                <select class="form-control" name="category_id" required>
                                    <option value="" selected>Select Catagory</option>

                                    @foreach ($cataInfo as $cataInfo)
                                        <option value="{{ $cataInfo->id }}">{{ $cataInfo->catagory_name_en }}</option>
                                    @endforeach

                                </select>

                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>



                            <div class="form-group">
                                <h5>Sub Category Name English <span class="text-danger">*</span></h5>
                                <input type="text" name="subcata_name_en" class="form-control"
                                    value="{{ old('subcata_name_en') }}">

                                @error('subcata_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <h5>Sub Catagory Name hindi<span class="text-danger">*</span> </h5>
                                <input type="text" name="subcata_name_hin" class="form-control"
                                    value="{{ old('subcata_name_hin') }}">

                                @error('subcata_name_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


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



@endsection
