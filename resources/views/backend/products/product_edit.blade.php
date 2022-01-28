@extends('admin.admin_master')

@section('title', 'Edit Product')

{{-- script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

{{-- script --}}


@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Edit Product</h4>
        </div>

        <form action="{{ route('product.update', $pdt_info->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="row">



                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Brand <span
                                    class="text-danger">*</span></label>
                            <select class="form-control" name="brand_id" required>
                                <option value="" selected disabled>Select</option>

                                @foreach ($brand as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ @$brand->id == $pdt_info->brand_id ? 'selected' : '' }}>
                                        {{ $brand->brand_name_en }}</option>
                                @endforeach

                            </select>

                            @error('brand_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Category <span class="text-danger">*</span>
                            </label>
                            <select class="form-control" name="category_id" required>
                                <option value="" disabled selected>Select</option>

                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}"
                                        {{ @$category->id == $pdt_info->category_id ? 'selected' : '' }}>
                                        {{ $category->catagory_name_en }}</option>
                                @endforeach

                            </select>

                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Sub Category <span
                                    class="text-danger">*</span> </label>
                            <select class="form-control" name="sub_category_id" required>
                                <option selected>Select</option>


                                @foreach ($sub_cate as $sub_cate)
                                    <option value="{{ $sub_cate->id }}"
                                        {{ @$sub_cate->id == $pdt_info->sub_category_id ? 'selected' : '' }}>
                                        {{ $sub_cate->subcata_name_en }}</option>
                                @endforeach

                            </select>

                            @error('sub_category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


            </div>
            {{-- First row end --}}

            <div class="row">
                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Sub Sub Category <span
                                    class="text-danger">*</span> </label>
                            <select class="form-control" name="sub_sub_category_id" required>
                                <option value="" selected>Select</option>

                                @foreach ($sub_sub_cate as $sub_sub_cate)
                                    <option value="{{ $sub_sub_cate->id }}"
                                        {{ @$sub_sub_cate->id == $pdt_info->sub_sub_category_id ? 'selected' : '' }}>
                                        {{ $sub_sub_cate->subsubcata_name_en }}</option>
                                @endforeach


                            </select>


                            @error('sub_sub_category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Name English <span
                                    class="text-danger">*</span> </label>


                            <input type="text" class="form-control" name="product_name_en"
                                value="{{ $pdt_info->product_name_en }}" required>

                            @error('product_name_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Name Hindi <span
                                    class="text-danger">*</span> </label>


                            <input type="text" class="form-control" name="product_name_hin"
                                value="{{ $pdt_info->product_name_hin }}" required>


                            @error('product_name_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>



            </div>
            {{-- Second row end --}}



            <div class="row">



                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Code <span
                                    class="text-danger">*</span> </label>


                            <input type="text" class="form-control" name="product_code"
                                value="{{ $pdt_info->product_code }}" required>


                            @error('product_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Quantity <span
                                    class="text-danger">*</span> </label>


                            <input type="number" class="form-control" name="product_qty"
                                value="{{ $pdt_info->product_qty }}" required>

                            @error('product_qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Tags English <span
                                    class="text-danger">*</span> </label>


                            <div class="tags-default">
                                <input type="text" name="product_tags_en" data-role="tagsinput" placeholder="add tags"
                                    value="{{ $pdt_info->product_tags_en }}" required />
                            </div>

                            @error('product_tags_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror



                        </div>
                    </div>
                </div>



            </div>

            {{-- Third Row End --}}

            <div class="row">



                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Tags hindi <span
                                    class="text-danger">*</span> </label>


                            <div class="tags-default">
                                <input type="text" name="product_tags_hin" data-role="tagsinput" placeholder="add tags"
                                    value="{{ $pdt_info->product_tags_hin }}" required />
                            </div>

                            @error('product_tags_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Size English <span
                                    class="text-danger">*</span> </label>


                            <div class="tags-default">
                                <input type="text" name="product_size_en" data-role="tagsinput"
                                    value="{{ $pdt_info->product_size_en }}" />
                            </div>


                            @error('product_size_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Size Hindi <span
                                    class="text-danger">*</span> </label>


                            <div class="tags-default">
                                <input type="text" name="product_size_hin" data-role="tagsinput"
                                    value="{{ $pdt_info->product_size_hin }}" />
                            </div>


                            @error('product_size_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror



                        </div>
                    </div>
                </div>




            </div>

            {{-- Four Row End --}}


            <div class="row">



                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Color English <span
                                    class="text-danger">*</span> </label>


                            <div class="tags-default">
                                <input type="text" name="product_color_en" data-role="tagsinput"
                                    value="{{ $pdt_info->product_color_en }}" />
                            </div>


                            @error('product_color_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Color Hindi <span
                                    class="text-danger">*</span> </label>


                            <div class="tags-default">
                                <input type="text" name="product_color_hin" data-role="tagsinput"
                                    value="{{ $pdt_info->product_color_hin }}" />
                            </div>


                            @error('product_color_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>
                </div>



                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Selling Price <span
                                    class="text-danger">*</span> </label>



                            <input type="text" name="selling_price" class="form-control"
                                value="{{ $pdt_info->selling_price }}" required />


                            @error('selling_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror



                        </div>
                    </div>
                </div>








            </div>

            {{-- Five row End --}}



            <div class="row">



                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Discount Price </label>



                            <input type="text" name="discount_price" class="form-control"
                                value="{{ $pdt_info->discount_price }}" />


                            @error('discount_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Thumbnail<span
                             class="text-danger">*</span> </label>
                                <br>

                             <img style="width: 100px; height:100px" src="{{url($pdt_info->product_thumbnail)}}" id="mainThmb" alt="">

                            <input type="file" name="product_thumbnail" class="form-control"
                                onChange="mainThamUrl(this)" />



                            @error('product_thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>







            </div>

            {{-- Six row End --}}


            <div class="row">



                <div class="col-md-6">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Short Description English <span
                                    class="text-danger">*</span> </label>



                            <input type="text" name="short_description_en" class="form-control"
                                value="{{ $pdt_info->short_description_en }}" />

                            @error('short_description_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Short Description Hindi <span
                                    class="text-danger">*</span> </label>



                            <input type="text" name="short_description_hin" class="form-control"
                                value="{{ $pdt_info->short_description_hin }}" />



                            @error('short_description_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>
                    </div>
                </div>


            </div>
            {{-- Six row End --}}


            <div class="row">



                <div class="col-md-6">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Long Description English <span
                                    class="text-danger">*</span> </label>




                            <textarea id="editor1" name="long_description_en" rows="10" cols="80">
                                        {!! $pdt_info->long_description_en !!}
                                </textarea>

                            @error('long_description_en')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror



                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Long Description Hindi <span
                                    class="text-danger">*</span> </label>



                            <textarea id="editor2" name="long_description_hin" rows="10" cols="80">
                                        {!! $pdt_info->long_description_hin !!}
                                </textarea>



                            @error('long_description_hin')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>


            </div>
            {{-- seven row End --}}

            <hr>

            <div class="row">

                <div class="col-md-6">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">


                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_1" name="featured"
                                        value="1"
                                        {{ @$pdt_info->featured == 1 ? 'checked' : '' }}>
                                    <label for="checkbox_1"> Featured</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_2" name="hot_deals"
                                        value="1"
                                        {{ @$pdt_info->hot_deals == 1 ? 'checked' : '' }}>
                                    <label for="checkbox_2">Hot Deals</label>
                                </fieldset>
                            </div>



                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">


                            <div class="controls">
                                <fieldset>
                                    <input type="checkbox" id="checkbox_3" name="special_offer"
                                        value="1"
                                        {{ @$pdt_info->special_offer == 1 ? 'checked' : '' }}>
                                    <label for="checkbox_3"> Special Offer</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" name="special_deals"
                                        value="1"
                                        {{ @$pdt_info->special_deals == 1 ? 'checked' : '' }}>
                                    <label for="checkbox_4">Special Deals</label>
                                </fieldset>
                            </div>



                        </div>
                    </div>
                </div>



            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="box-body my-5">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update Product">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Last Row End --}}



        </form>

    </div>


    <div class="box">

        <div class="box-header with-border">
            <h4 class="box-title text-light">Update Product Galary</h4>
        </div>


        <form action="{{route('image.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">



                @foreach ($multiImg as $key => $multiImg)


                    <div class="col-md-3">
                        <div class="card p-3">
                            <img class="card-img-top" style="width: 250px" src="{{url($multiImg->image_path) }}" alt="Card image cap">

                            <div class="div">
                                <a href="{{route('image.remove',$multiImg->id )}}" class="btn btn-danger btn-sm delete"><i class="fa fa-remove"></i></a>
                            </div>

                            <div class="card-body">


                                <div class="form-group form-group-float">
                                    <label class="form-group-float-label text-light">Choose Image </label>


                                    <input type="file" name="multiImg[{{$multiImg->id}}]" class="form-control" />



                                </div>

                            </div>
                        </div>
                    </div>


                @endforeach



            </div>

            <div class="form-group my-5">

                <input type="submit" value="Update Galary" class="btn btn-primary" />

            </div>

        </form>
    </div>



    <script>
          function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>




    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var cateId = $(this).val();

                if (cateId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('product/subcata/ajax') }}/" + cateId,
                        dataType: "json",
                        success: function(data) {
                            $('select[name="sub_category_id"]').empty();
                            $('select[name="sub_sub_category_id"]').empty();
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


            $('select[name="sub_category_id"]').on('change', function() {
                var subcateId = $(this).val();

                if (subcateId) {
                    $.ajax({


                        type: "GET",
                        url: "{{ url('product/sub_sub_cata/ajax') }}/" + subcateId,
                        dataType: "json",
                        success: function(data) {

                            $('select[name="sub_sub_category_id"]').empty();

                            $.each(data, function(key, value) {
                                $('select[name="sub_sub_category_id"]').append(
                                    ' <option value="' + value.id + '">' + value
                                    .subsubcata_name_en + '</option>'
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


    {{-- Image Preview --}}



@endsection
