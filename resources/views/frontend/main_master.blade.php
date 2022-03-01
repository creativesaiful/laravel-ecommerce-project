<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title> @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->

    @include('frontend.body.header')



    @yield('content')



    @include('frontend.body.footer')




    <!-- For demo purposes – can be removed on production : End -->

    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script>
        @if (Session::has('message'))
            var type = ("{{ Session::get('type') }}");

            var message = ("{{ Session::get('message') }}");
            switch (type) {
            case 'success':
            toastr.success(message);
            break;
            case 'warning':
            toastr.warning(message);
            break;
            case 'mootools':
            toastr.error(message);
            break;
            case 'danger':
            toastr.danger(message);
            break;
            }
        @endif
    </script>


    <!-- Add to Cart Product Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <strong> <span id="pname"></span> </strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modalclose">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-4">

                            <div class="card" style="width: 18rem;">
                                <img src=" " class="card-img-top" alt="..." style="height: 200px; width: 180px;"
                                    id="pimage">
                            </div>

                        </div><!-- // end col md -->


                        <div class="col-md-4">

                            <ul class="list-group">
                                <li class="list-group-item">Product Price: <strong class="text-danger">$<span
                                            id="pprice"></span></strong>
                                    <del id="oldprice">$</del>
                                </li>
                                <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                                <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                                <li class="list-group-item">Brand: <strong id="pbrand"></strong></li>

                                <li class="list-group-item">Stock: <span class="badge badge-pill badge-success"
                                        id="aviable" style="background: green; color: white;"></span>
                                    <span class="badge badge-pill badge-danger" id="stockout"
                                        style="background: red; color: white;"></span>

                                </li>
                            </ul>

                        </div><!-- // end col md -->


                        <div class="col-md-4">

                            <div class="form-group" id="colorArea">
                                <label for="color">Choose Color</label>
                                <select class="form-control" id="color" name="color"> </select>
                            </div>

                            <div class="form-group" id="sizeArea">
                                <label for="size">Choose Size</label>
                                <select class="form-control" id="size" name="size">


                                </select>
                            </div> <!-- // end form group -->

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" value="1" min="1">
                            </div> <!-- // end form group -->

                            <input type="hidden" id="productId">

                            <button type="submit" class="btn btn-primary mb-2" id="AddToCart" onclick="addToCart()">Add
                                to Cart</button>




                        </div><!-- // end col md -->




                    </div> <!-- // end row -->










                </div> <!-- // end modal Body -->

            </div>
        </div>
    </div>
    <!-- End Add to Cart Product Modal -->

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        // Start Product View with Modal
        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    //console.log(data)
                    $('#pname').text(data.product.product_name_en);
                    $('#price').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.catagory_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#pimage').attr('src', '/' + data.product.product_thumbnail);
                    $("#productId").val(data.product.id);

                    // Product Price
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#pprice').text(data.product.discount_price);
                        $('#oldprice').text(data.product.selling_price);
                    } // end prodcut price
                    // Start Stock opiton
                    if (data.product.product_qty > 0) {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#aviable').text('aviable');
                    } else {
                        $('#aviable').text('');
                        $('#stockout').text('');
                        $('#stockout').text('stockout');
                    } // end Stock Option

                    // Color
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')

                        if (data.color == "") {
                            $('#colorArea').hide();
                        } else {
                            $('#colorArea').show();
                        }
                    }) // end color
                    // Size
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value=" ' + value + ' ">' + value +
                            ' </option>')
                        if (data.size == "") {
                            $('#sizeArea').hide();
                        } else {
                            $('#sizeArea').show();
                        }
                    }) // end size




                }
            })

        }


        function addToCart() {

            var productId = $('#productId').val();
            var color = $('#color').val();
            var size = $('#size').val();
            var quantity = $('#quantity').val();



            $.ajax({
                type: "post",
                url: "/cart/data/store/" + productId,
                data: {
                    productId: productId,
                    color: color,
                    size: size,
                    quantity: quantity

                },
                dataType: "json",
                success: function(data) {

                    $("#modalclose").click();
                    //conlose.log(success);
                    // Start Message
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })
                    }
                    // End Message

                } //end success
            }); // end ajax
            miniCart();
        } // end add to cart
    </script>


    <script>
        //mini cart  fucntion
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/cart/data/mini',
                dataType: 'json',
                success: function(data) {
                    //console.log(data)

                    $('#cart_count').text(data.cart_count);
                    $('#cart_total').text(data.cart_total);
                    $("#sub_total").text(data.cart_total);

                    var minicart = '';

                    $.each(data.cart, function(key, value) {
                        minicart += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href=""><img
                                                        src="/${value.options.image}" alt=""></a> </div>
                                        </div>


                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name} </a></h3>
                                            <div class="price">${value.price}*${value.qty} </div>
                                        </div>


                                        <div class="col-xs-1 action">
                                         <button type="submit" id='${value.rowId}' onclick="miniCartRemove(this.id)" > <i class="fa fa-trash">   </i>

                                        </button>
                                        </div>
                                    </div>

                                </div>   <br>`;
                    });

                    $("#minicartItem").html(minicart);


                }
            })
        }

        miniCart();


        function miniCartRemove(rowId) {

            $.ajax({
                type: "get",
                url: "/mini/data/remove/"+ rowId,
                data: "data",
                dataType: "json",
                success: function (data) {
                    miniCart();

                    // Start Message
                    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 3000
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: data.error
                                })
                            }
                            // End Message
                }
            });
        }

    </script>
{{-- end mini cart function --}}

{{-- Add Wish list --}}
    <script>
        function addWishList($id){
            $.ajax({
                type: "get",
                url: "/wishlist/data/add/"+$id,
                data: "data",
                dataType: "json",
                success: function (data) {

                    // Start Message
                    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 3000
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    type: 'error',
                                    title: data.error
                                })
                            }
                            // End Message
                }
            });
        }
    </script>


{{-- End Add Wish list --}}

{{-- Remove wish Start --}}

<script>
    function removeWish($id){
        $.ajax({
            type: "get",
            url: "/wishlist/data/remove/"+$id,
            data: "data",
            dataType: "json",
            success: function (data) {
                location.reload();
                // Start Message
                const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 3000
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                icon: 'success',
                                type: 'success',
                                title: data.success
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                type: 'error',
                                title: data.error
                            })
                        }
                        // End Message
            }
        });
    }
</script>


</body>

</html>
