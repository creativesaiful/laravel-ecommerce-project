@extends('admin.admin_master')

@section('title', 'Slide Edit')
@section('content')

<div class="row">

    <div class="col-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Slide</h3>
            </div>
            <!-- /.box-header -->


            <div class="box-body">
                <form action="{{route('slider.update',$slideInfo->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <h5>Slider Title<span class="text-danger">*</span></h2>
                            <input type="text" name="title" class="form-control"
                                value="{{ $slideInfo->title }}">

                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>


                    <div class="form-group">
                        <h5>Slide Description<span class="text-danger">*</span> </h5>
                        <input type="text" name="description" class="form-control"
                            value="{{ $slideInfo->description }}">

                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror


                    </div>

                    <div class="form-group">
                        <h5>Slider Image</h5>
                        <input type="file" name="slider_img" class="form-control" id="brand_image" onchange="previewEditImg()">
                        <span>For better image size should be 870*370 px</span> <br>

                        @error('slider_img')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <div class="controls">
                            <img style="width: 870px; height:370px" id="brandEditImg" src="{{url($slideInfo->slider_img)}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Update">
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
