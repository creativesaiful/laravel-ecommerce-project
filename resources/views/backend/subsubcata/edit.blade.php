@extends('admin.admin_master')

@section('title', 'Sub Sub Category edit');


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

{{-- Jquery script --}}

@section('content')
    <div class="row">


        <div class="col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Sub Sub Category</h3>
                </div>
                <!-- /.box-header -->


                <div class="box-body">
                    <form action="{{ route('subsubcata.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{$subsubInfo->id}}">

                        <div class="form-group">
                            <h5>Select Catagory <span class="text-danger">*</span></h5>

                            <select class="form-control" name="category_id" required>

                                @foreach ($cataInfo as $cataInfo)
                                    <option value="{{ $cataInfo->id }}" {{$cataInfo->id==$subsubInfo->category_id ? 'Selected' : ''}} >{{ $cataInfo->catagory_name_en }}</option>
                                @endforeach

                            </select>

                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>


                        <div class="form-group">
                            <h5>Select Sub Catagory <span class="text-danger">*</span></h5>

                            <select class="form-control" name="sub_category_id" required>

                                @foreach ($subCateInfo as $subCateInfo)
                                    <option value="{{ $subCateInfo->id }}" {{$subCateInfo->id==$subsubInfo->sub_category_id ? 'Selected' : ''}} >{{ $subCateInfo->subcata_name_en }}</option>
                                @endforeach

                            </select>

                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>





                        <div class="form-group">
                            <h5>Sub Sub Category Name English <span class="text-danger">*</span></h2>
                                <input type="text" name="subsubcata_name_en" class="form-control"
                                    value="{{ $subsubInfo->subsubcata_name_en}}">

                                @error('subsubcata_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>


                        <div class="form-group">
                            <h5>Sub Sub Category hindi<span class="text-danger">*</span> </h5>
                            <input type="text" name="subsubcata_name_hin" class="form-control"
                                value="{{ $subsubInfo->subsubcata_name_hin }}">

                            @error('subsubcata_name_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


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
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var cateId = $(this).val();

                if (cateId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('subsubcata/ajax') }}/" + cateId,
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_category_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_category_id"]').append(
                                    ' <option value="' + value.id + '">' + value
                                    .subcata_name_en + '</option>'
                                )
                            });
                        }
                    });
                } else {
                    alert('sorry');
                }

            })
        });
    </script>


@endsection
