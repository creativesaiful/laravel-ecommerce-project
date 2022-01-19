@extends('admin.admin_master')

@section('title', 'catagory edit');

@section('content')
    <div class="row">


        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Category</h3>
                </div>
                <!-- /.box-header -->


                <div class="box-body">
                    <form action="{{ route('catagory.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{$cataInfo->id}}">
                        <div class="form-group">
                            <h5>Category Name English <span class="text-danger">*</span></h2>
                                <input type="text" name="catagory_name_en" class="form-control"
                                    value="{{ $cataInfo->catagory_name_en}}">

                                @error('catagory_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>


                        <div class="form-group">
                            <h5>Category Name hindi<span class="text-danger">*</span> </h5>
                            <input type="text" name="catagory_name_hin" class="form-control"
                                value="{{ $cataInfo->catagory_name_hin }}">

                            @error('catagory_name_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>

                        <div class="form-group">
                            <h5>Category Icon <span class="text-danger">*</span> </h5>
                            <input type="text" name="catagory_icon" class="form-control" id="catagory_image" value="{{$cataInfo->catagory_icon}}">
                            <span>Please add icon as like (fa fa facebook)</span>

                            @error('catagory_icon')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="form-group d-none" id="CataimgDev">
                            <div class="controls">
                                <img style="width: 300px; height:300px" id="CataUpImg">
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update Brand">
                        </div>






                    </form>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>
@endsection
