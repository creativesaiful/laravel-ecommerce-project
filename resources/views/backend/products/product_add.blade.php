@extends('admin.admin_master')

@section('title', 'Add Product')

{{-- script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

{{-- script --}}


@section('content')

    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Add Product</h4>
        </div>

        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
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
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>
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
                                    <option value="{{ $category->id }}">{{ $category->catagory_name_en }}</option>
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


                            <input type="text" class="form-control" name="product_name_en" required>

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


                            <input type="text" class="form-control" name="product_name_hin" required>


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


                            <input type="text" class="form-control" name="product_code" required>


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


                            <input type="number" class="form-control" name="product_qty" required>

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
                                    required />
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
                                    required />
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
                                <input type="text" name="product_size_en" data-role="tagsinput" placeholder="add Size" />
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
                                <input type="text" name="product_size_hin" data-role="tagsinput" placeholder="add size" />
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
                                <input type="text" name="product_color_en" data-role="tagsinput" placeholder="add color" />
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
                                <input type="text" name="product_color_hin" data-role="tagsinput" placeholder="add color" />
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



                            <input type="text" name="selling_price" class="form-control" required />


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



                            <input type="text" name="discount_price" class="form-control" />


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



                            <input type="file" name="product_thumbnail" class="form-control"
                                onChange="mainThamUrl(this)" required />

                            <img src="" id="mainThmb" class="my-3">

                            @error('product_thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="box-body py-2">
                        <div class="form-group form-group-float">
                            <label class="form-group-float-label text-light">Product Galary<span
                                    class="text-danger">*</span> </label>



                            <input type="file" name="multi_images[]" multiple='' id="multiImg" class="form-control" />

                            <div class="row my-3" id="preview_img"></div>

                            @error('multi_images[]')
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



                            <input type="text" name="short_description_en" class="form-control" />

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



                            <input type="text" name="short_description_hin" class="form-control" />



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
                                    <input type="checkbox" id="checkbox_1" name="featured" value="1">
                                    <label for="checkbox_1"> Featured</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
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
                                    <input type="checkbox" id="checkbox_3" name="special_offer" value="1">
                                    <label for="checkbox_3"> Special Offer</label>
                                </fieldset>
                                <fieldset>
                                    <input type="checkbox" id="checkbox_4" name="special_deals" value="1">
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
                            <input type="submit" class="btn btn-primary" value="Add Product">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Last Row End --}}



        </form>

    </div>



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

    <script>
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }


        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change

                $('#preview_img').empty();
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file



                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(80)
                                        .height(80); //create image element
                                    $('#preview_img').append(
                                    img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>

@endsection
