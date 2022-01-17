@extends('admin.admin_master')

@section('title', 'brand Edit')
@section('content')

<div class="row">

    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Brand</h3>
            </div>
            <!-- /.box-header -->


            <div class="box-body">
                <form action="{{route('brand.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" value="{{ $brandInfobyid->id }}" name="id">


                    <div class="form-group">
                        <h5>Brand Name English <span class="text-danger">*</span></h2>
                            <input type="text" name="brand_name_en" class="form-control"
                                value="{{ $brandInfobyid->brand_name_en }}">

                            @error('brand_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>


                    <div class="form-group">
                        <h5>Brand Name hindi <span class="text-danger">*</span> </h5>
                        <input type="text" name="brand_name_hin" class="form-control"
                            value="{{ $brandInfobyid->brand_name_hin }}">

                        @error('brand_name_hin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>

                    <div class="form-group">
                        <h5>Brand Image</h5>
                        <input type="file" name="brand_image" class="form-control" id="brand_image" onchange="previewEditImg()">
                        <span>For better image size should be 300*300 px</span> <br>

                        @error('brand_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <img style="width: 300px; height:300px" id="brandEditImg" src="{{url($brandInfobyid->brand_image)}}">
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


<script>
     function previewEditImg() {
        brandEditImg.src = URL.createObjectURL(event.target.files[0]);
        }
</script>

@endsection
