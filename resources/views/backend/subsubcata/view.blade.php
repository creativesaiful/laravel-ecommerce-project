@extends('admin.admin_master')

@section('title', 'Catagory View')

@section('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- Main content -->
    <section class="content">
        <div class="row">




            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Sub Sub Categories</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Catagory id</th>
                                        <th>Sub Catagory id</th>
                                        <th>Sub Sub Category Name</th>
                                        <th>Sub Sub Category Hindi</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($subsubInfo as $subsubInfo)
                                        <tr>
                                            <td>{{ $subsubInfo['category']['catagory_name_en'] }}</td>
                                            <td>{{ $subsubInfo['subcategory']['subcata_name_en']}}</td>
                                            <td>{{ $subsubInfo->subsubcata_name_en }}</td>


                                            <td>
              <a href="{{ route('subsubcata.edit', $subsubInfo->id) }}"
                                                    class="btn btn-info ">Edit</a>
                   <a href="{{ route('subsubcata.delete', $subsubInfo->id) }}"
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
                        <h3 class="box-title">Add Sub Sub Category</h3>
                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <form action="{{ route('subsubcata.store') }}" method="POST" enctype="multipart/form-data">
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
                                <h5>Select Sub Catagory <span class="text-danger">*</span></h5>

                                <select class="form-control" name="sub_category_id" required>
                                    <option value="" selected>Select Subcategory</option>


                                </select>

                                @error('sub_category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="form-group">
                                <h5>Sub Sub Category Name English <span class="text-danger">*</span></h5>
                                <input type="text" name="subsubcata_name_en" class="form-control"
                                    value="{{ old('subsubcata_name_en') }}" required>

                                @error('subsubcata_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <h5>Sub Sub Catagory Name hindi<span class="text-danger">*</span> </h5>
                                <input type="text" name="subsubcata_name_hin" class="form-control"
                                    value="{{ old('subsubcata_name_hin') }}">

                                @error('subsubcata_name_hin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror


                            </div>



                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Add">
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
