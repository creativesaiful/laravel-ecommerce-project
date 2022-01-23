@extends('admin.admin_master')

@section('title', 'Catagory View')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">




            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category English</th>
                                        <th>Category Hindi</th>
                                        <th>Icon</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($cataInfo as $cataInfo)
                                        <tr>
                                            <td>{{ $cataInfo->catagory_name_en }}</td>
                                            <td>{{ $cataInfo->catagory_name_hin }}</td>
                                            <td>
                                                <i class="{{$cataInfo->catagory_icon}}"></i>
                                            <td>

                                                <a href="{{ route('catagory.edit', $cataInfo->id) }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="{{route('catagory.delete',$cataInfo->id)}}"  class="btn btn-danger delete">Delete</a>

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
                        <h3 class="box-title">Add New Category</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <form action="{{ route('catagory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Category Name English <span class="text-danger">*</span></h2>
                                    <input type="text" name="catagory_name_en" class="form-control"
                                        value="{{ old('catagory_name_en') }}">

                                    @error('catagory_name_en')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>


                            <div class="form-group">
                                <h5>Catagory Name hindi<span class="text-danger">*</span> </h5>
                                <input type="text" name="catagory_name_hin" class="form-control"
                                    value="{{ old('catagory_name_hin') }}">

                                @error('catagory_name_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>

                            <div class="form-group">
                                <h5>Category Icon <span class="text-danger">*</span> </h5>
                                <input type="text" name="catagory_icon" class="form-control" id="catagory_image">
                                <span>Please add icon as like (fa fa facebook)</span>

                                @error('catagory_icon')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>



                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add Category">
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
