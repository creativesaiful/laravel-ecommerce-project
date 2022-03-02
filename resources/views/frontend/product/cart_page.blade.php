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

                                    <th scope="col" >Image</th>
                                    <th scope="col" >Name</th>
                                    <th scope="col" >Color</th>
                                    <th scope="col" >Size</th>
                                    <th scope="col" >Quantity</th>
                                    <th scope="col" >Subtotal</th>
                                    <th scope="col" >Remove</th>
                                </tr>
                            </thead>

                            <tbody id="cartPage">





                            </tbody>
                        </table>


                </div>
            </div>
        </div>

@endsection
