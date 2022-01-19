@extends('admin.admin_master')

@section('title', 'catagory edit');

@section('content')
    <div class="row">


        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Sub Category</h3>
                </div>
                <!-- /.box-header -->


                <div class="box-body">
                    <form action="{{ route('subcata.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{$subcatainfo->id}}">

                        <div class="form-group">
                            <h5>Select Catagory <span class="text-danger">*</span></h5>

                            <select class="form-control" name="category_id" required>

                                @foreach ($cataInfo as $cataInfo)
                                    <option value="{{ $cataInfo->id }}" {{$subcatainfo->category_id ==$cataInfo->id ? 'selected' : ''}} >{{ $cataInfo->catagory_name_en }}</option>
                                @endforeach

                            </select>

                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>





                        <div class="form-group">
                            <h5>Sub Category Name English <span class="text-danger">*</span></h2>
                                <input type="text" name="subcata_name_en" class="form-control"
                                    value="{{ $subcatainfo->subcata_name_en}}">

                                @error('subcata_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>


                        <div class="form-group">
                            <h5>Sub Category hindi<span class="text-danger">*</span> </h5>
                            <input type="text" name="subcata_name_hin" class="form-control"
                                value="{{ $subcatainfo->subcata_name_hin }}">

                            @error('subcata_name_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


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
