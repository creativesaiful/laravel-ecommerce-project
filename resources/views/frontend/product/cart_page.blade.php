@extends('frontend.main_master')

@section('title')
    Cart Page
@endsection

@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Cart</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->



    <div class="container">

        <div class="row">
            <div class="col-md-12">


                <h2>My Cart</h2>

                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Color</th>
                            <th scope="col">Size</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>

                    <tbody id="cartPage">





                    </tbody>
                </table>


            </div>
        </div>

        <div class="row">


            <div class="col-md-4 col-sm-12 estimate-ship-tax">
                @if (Session::has('coupon'))
                @else
                    <table class="table" id="couponField">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">Discount Code</span>
                                    <p>Enter your coupon code if you have one..</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control unicase-form-control text-input"
                                            placeholder="You Coupon.." id="coupon_name">
                                    </div>
                                    <div class="clearfix pull-right">
                                        <button type="submit" class="btn-upper btn btn-primary"
                                            onclick="applyCoupon()">APPLY COUPON</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                @endif


            </div><!-- /.estimate-ship-tax -->





            <div class="col-md-8 col-sm-12 cart-shopping-total">
                <table class="table">
                    <thead id="couponCalField">

                    </thead><!-- /thead -->
                    <tbody>
                        <tr>
                            <td>
                                <div class="cart-checkout-btn pull-right">
                                    <a href="" type="submit"
                                        class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</a>

                                </div>
                            </td>
                        </tr>
                    </tbody><!-- /tbody -->
                </table><!-- /table -->
            </div><!-- /.cart-shopping-total -->








        </div>
    </div>
@endsection
