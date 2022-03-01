@extends('frontend.main_master')

@section('title')
    Wishlist
@endsection

@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Wishlist</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="container">
    <div class="my-wishlist-page">
        <div class="row">
            <div class="col-md-12 my-wishlist">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="4" class="heading-title">My Wishlist</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($wishlistAll as $wish)

                            <tr>
                                <td class="col-md-2"><img style="width: 100px" src="{{asset($wish['productInfo']['product_thumbnail'])}}" alt="imga"></td>
                                <td class="col-md-7">
                                    <div class="product-name"><a href="#">

                                        @if (session()->get('language') == 'hindi')
                                        {{ $wish['productInfo']['product_name_hin'] }}
                                    @else
                                        {{ $wish['productInfo']['product_name_en']  }}
                                    @endif</a></div>


                                    <div class="price">
                                       {{ $wish['productInfo']['discount_price']}} Tk
                                        <del> {{@ $wish['productInfo']['discount_price'] }} Tk</del>
                                    </div>


                                </td>
                                <td class="col-md-2">

                                    <button class="btn-upper btn btn-primary" data-toggle="modal" data-target="#exampleModal"  id="{{ $wish->product_id }}" onclick="productView(this.id)"
                                        type="button"> Add to cart
                                    </button>
                                </td>
                                <td class="col-md-1 close-btn">

                                    <button class="btn-upper btn btn-danger"  id="{{ $wish->id }}" onclick="removeWish(this.id)"
                                        type="button"> <i class="fa fa-times"></i>
                                    </button>

                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.row -->


    </div>
    @include('frontend.body.brands')
 </div>




@endsection
