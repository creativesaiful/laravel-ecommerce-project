@extends('frontend.main_master')

@section('title', 'Home')

@section('content')

    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li class='active'>Handbags</li>
                </ul>
            </div>
            <!-- /.breadcrumb-inner -->
        </div>
        <!-- /.container -->
    </div>

    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class='row'>
                <div class='col-md-3 sidebar'>
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('frontend.body.vertical_menu')
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                    <div class="sidebar-module-container">
                        <div class="sidebar-filter">
                            <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <h3 class="section-title">shop by</h3>
                                <div class="widget-header">
                                    <h4 class="widget-title">Category</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="accordion">

                                        @php
                                            $catagories = App\Models\Catagory::orderBy('catagory_name_en', 'ASC')->get();
                                        @endphp

                                        @foreach ($catagories as $catagory)
                                            <div class="accordion-group">
                                                <div class="accordion-heading"> <a href="#collapseOne{{ $catagory->id }}"
                                                        data-toggle="collapse" class="accordion-toggle collapsed">

                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $catagory->catagory_name_hin }}
                                                        @else
                                                            {{ $catagory->catagory_name_en }}
                                                        @endif

                                                    </a> </div>
                                                <!-- /.accordion-heading -->
                                                <div class="accordion-body collapse" id="collapseOne{{ $catagory->id }}"
                                                    style="height: 0px;">
                                                    <div class="accordion-inner">
                                                        <ul>
                                                            @php
                                                                $sub_categories = App\Models\Subcata::where('category_id', $catagory->id)
                                                                    ->orderBy('subcata_name_en', 'ASC')
                                                                    ->get();

                                                            @endphp

                                                            @foreach ($sub_categories as $sub_category)
                                                                <li><a href="{{url('/product/subcategory/'.$sub_category->id.'/'.$sub_category->subcata_slug_en)}}">
                                                                        @if (session()->get('language') == 'hindi')
                                                                            {{ $sub_category->subcata_name_hin }}
                                                                        @else
                                                                            {{ $sub_category->subcata_name_en }}
                                                                        @endif

                                                                    </a></li>
                                                            @endforeach


                                                        </ul>
                                                    </div>
                                                    <!-- /.accordion-inner -->
                                                </div>
                                                <!-- /.accordion-body -->
                                            </div>
                                            <!-- /.accordion-group -->
                                        @endforeach



                                    </div>
                                    <!-- /.accordion -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                            <!-- ============================================== PRICE SILDER============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Price Slider</h4>
                                </div>
                                <div class="sidebar-widget-body m-t-10">
                                    <div class="price-range-holder"> <span class="min-max"> <span
                                                class="pull-left">$200.00</span> <span
                                                class="pull-right">$800.00</span> </span>
                                        <input type="text" id="amount"
                                            style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                        <input type="text" class="price-slider" value="">
                                    </div>
                                    <!-- /.price-range-holder -->
                                    <a href="#" class="lnk btn btn-primary">Show Now</a>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== PRICE SILDER : END ============================================== -->
                            <!-- ============================================== MANUFACTURES============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Manufactures</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Forever 18</a></li>
                                        <li><a href="#">Nike</a></li>
                                        <li><a href="#">Dolce & Gabbana</a></li>
                                        <li><a href="#">Alluare</a></li>
                                        <li><a href="#">Chanel</a></li>
                                        <li><a href="#">Other Brand</a></li>
                                    </ul>
                                    <!--<a href="#" class="lnk btn btn-primary">Show Now</a>-->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== MANUFACTURES: END ============================================== -->
                            <!-- ============================================== COLOR============================================== -->
                            <div class="sidebar-widget wow fadeInUp">
                                <div class="widget-header">
                                    <h4 class="widget-title">Colors</h4>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul class="list">
                                        <li><a href="#">Red</a></li>
                                        <li><a href="#">Blue</a></li>
                                        <li><a href="#">Yellow</a></li>
                                        <li><a href="#">Pink</a></li>
                                        <li><a href="#">Brown</a></li>
                                        <li><a href="#">Teal</a></li>
                                    </ul>
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== COLOR: END ============================================== -->
                            <!-- ============================================== COMPARE============================================== -->
                            <div class="sidebar-widget wow fadeInUp outer-top-vs">
                                <h3 class="section-title">Compare products</h3>
                                <div class="sidebar-widget-body">
                                    <div class="compare-report">
                                        <p>You have no <span>item(s)</span> to compare</p>
                                    </div>
                                    <!-- /.compare-report -->
                                </div>
                                <!-- /.sidebar-widget-body -->
                            </div>
                            <!-- /.sidebar-widget -->
                            <!-- ============================================== COMPARE: END ============================================== -->
                            <!-- ============================================== PRODUCT TAGS ============================================== -->
                            @include('frontend.body.product_tags')


                            <!-- /.sidebar-widget -->
                            <!----------- Testimonials------------->
                            @include('frontend.body.testemonial')

                            <!-- ============================================== Testimonials: END ============================================== -->

                            <div class="home-banner"> <img src="assets/images/banners/LHS-banner.jpg" alt="Image"> </div>
                        </div>
                        <!-- /.sidebar-filter -->
                    </div>
                    <!-- /.sidebar-module-container -->
                </div>
                <!-- /.sidebar -->
                <div class='col-md-9'>
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="category" class="category-carousel hidden-xs">
                        <div class="item">
                            <div class="image"> <img
                                    src="{{ asset('frontend/assets/images/banners/cat-banner-1.jpg') }}" alt=""
                                    class="img-responsive"> </div>
                            <div class="container-fluid">
                                <div class="caption vertical-top text-left">
                                    <div class="big-text"> Big Sale </div>
                                    <div class="excerpt hidden-sm hidden-md"> Save up to 49% off </div>
                                    <div class="excerpt-normal hidden-sm hidden-md"> Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit </div>
                                </div>
                                <!-- /.caption -->
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                    </div>


                    <div class="clearfix filters-container m-t-10">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active"> <a data-toggle="tab" href="#grid-container"><i
                                                    class="icon fa fa-th-large"></i>Grid</a> </li>
                                        <li><a data-toggle="tab" href="#list-container"><i
                                                    class="icon fa fa-th-list"></i>List</a></li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-12 col-md-6">
                                <div class="col col-sm-3 col-md-6 no-padding">
                                    <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                                        <div class="fld inline">
                                            <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                                                <button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
                                                    Position <span class="caret"></span> </button>
                                                <ul role="menu" class="dropdown-menu">
                                                    <li role="presentation"><a href="#">position</a></li>
                                                    <li role="presentation"><a href="#">Price:Lowest first</a></li>
                                                    <li role="presentation"><a href="#">Price:HIghest first</a></li>
                                                    <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.fld -->
                                    </div>
                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                                <div class="col col-sm-3 col-md-6 no-padding">

                                    <!-- /.lbl-cnt -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.col -->
                            <div class="col col-sm-6 col-md-4 text-right">

                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">

                                        @foreach ($products as $product)
                                        <div class="col-sm-6 col-md-4 wow fadeInUp">

                                            <div class="products">
                                                <div class="product">
                                                    <div class="product-image">
                                                        <div class="image"> <a href="{{url('product/details/' . $product->id . '/' . $product->product_slug_en)}}"><img
                                                                    src="{{asset($product->product_thumbnail)}}" alt=""></a> </div>
                                                        <!-- /.image -->



                                                           @php
                                                                $amount = $product->selling_price -$product->discount_price;
                                                                $discount = round(($amount / $product->selling_price) * 100);
                                                            @endphp

                                                            @if ($discount == null)
                                                                <div class="tag new"><span>new</span></div>
                                                            @else
                                                                <div class="tag hot">
                                                                    <span>{{ $discount }}%</span>
                                                                </div>
                                                            @endif
                                                    </div>
                                                    <!-- /.product-image -->

                                                    <div class="product-info text-left">
                                                        <h3 class="name"><a href="{{url('product/details/' . $product->id . '/' . $product->product_slug_en)}}">
                                                            @if (session()->get('language') == 'hindi')
                                                            {{ $product->product_name_hin }}
                                                        @else
                                                            {{ $product->product_name_en }}
                                                        @endif


                                                        </a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="description"></div>
                                                        <div class="product-price">

                                                    @if ($product->discount_price==NULL)
                                                    <span class="price"> $ {{$product->selling_price}}</span>

                                                    @else
                                                    <span class="price"> ${{$product->discount_price}} </span>

                                                    <span class="price-before-discount">$ {{$product->selling_price}}</span>

                                                    @endif


                                                        </div>
                                                        <!-- /.product-price -->

                                                    </div>
                                                    <!-- /.product-info -->
                                                    <div class="cart clearfix animate-effect">
                                                        <div class="action">
                                                            <ul class="list-unstyled">
                                                                <li class="add-cart-button btn-group">
                                                                    <button class="btn btn-primary icon" data-toggle="modal" data-target="#exampleModal"  id="{{ $product->id }}" onclick="productView(this.id)"
                                                                        type="button"> <i class="fa fa-shopping-cart"></i>
                                                                    </button>
                                                                    <button class="btn btn-primary cart-btn" type="button">Add to
                                                                        cart</button>
                                                                </li>

                                                                <li class="add-cart-button btn-group">
                                                                    <button
                                                                    class="btn btn-primary icon" type="button"
                                                                    title="Add Wishlist" id="{{ $product->id }}" onclick="addWishList(this.id)"> <i
                                                                        class="icon fa fa-heart"></i>
                                                                 </button>


                                                      </li>


                                                                <li class="lnk"> <a class="add-to-cart"
                                                                        href="detail.html" title="Compare"> <i
                                                                            class="fa fa-signal"></i> </a> </li>
                                                            </ul>
                                                        </div>
                                                        <!-- /.action -->
                                                    </div>
                                                    <!-- /.cart -->
                                                </div>
                                                <!-- /.product -->

                                            </div>
                                            <!-- /.products -->
                                        </div>
                                        <!-- /.item -->
                                        @endforeach



                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane " id="list-container">
                                <div class="category-product">

                                    @foreach ($products as $product)
                                    <div class="category-product-inner wow fadeInUp">
                                        <div class="products">
                                            <div class="product-list product">
                                                <div class="row product-list-row">
                                                    <div class="col col-sm-4 col-lg-4">
                                                        <div class="product-image">
                                                            <div class="image"> <img
                                                                    src="{{asset($product->product_thumbnail)}}" alt=""> </div>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col col-sm-8 col-lg-8">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="{{url('product/details/' . $product->id . '/' . $product->product_slug_en)}}">

                                                                @if (session()->get('language') == 'hindi')
                                                                {{ $product->product_name_hin }}
                                                            @else
                                                                {{ $product->product_name_en }}
                                                            @endif
                                                            </a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">


                                                    @if ($product->discount_price==NULL)
                                                    <span class="price"> $ {{$product->selling_price}}</span>

                                                    @else
                                                    <span class="price"> ${{$product->discount_price}} </span>

                                                    <span class="price-before-discount">$ {{$product->selling_price}}</span>

                                                    @endif

                                                                </div>
                                                            <!-- /.product-price -->
                                                            <div class="description m-t-10">

                                                                @if (session()->get('language') == 'hindi')
                                                                {{ $product->short_description_hin }}
                                                            @else
                                                                {{ $product->short_description_en }}
                                                            @endif

                                                            </div>
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            <button class="btn btn-primary icon"
                                                                                data-toggle="dropdown" type="button"> <i
                                                                                    class="fa fa-shopping-cart"></i>
                                                                            </button>
                                                                            <button class="btn btn-primary cart-btn"
                                                                                type="button">Add to cart</button>
                                                                        </li>
                                                                        <li class="lnk wishlist"> <a
                                                                                class="add-to-cart" href="detail.html"
                                                                                title="Wishlist"> <i
                                                                                    class="icon fa fa-heart"></i> </a>
                                                                        </li>
                                                                        <li class="lnk"> <a
                                                                                class="add-to-cart" href="detail.html"
                                                                                title="Compare"> <i
                                                                                    class="fa fa-signal"></i> </a> </li>
                                                                    </ul>
                                                                </div>
                                                                <!-- /.action -->
                                                            </div>
                                                            <!-- /.cart -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-list-row -->
                                                @php
                                                $amount = $product->selling_price -$product->discount_price;
                                                $discount = round(($amount / $product->selling_price) * 100);
                                            @endphp

                                            @if ($discount == null)
                                                <div class="tag new"><span>new</span></div>
                                            @else
                                                <div class="tag hot">
                                                    <span>{{ $discount }}%</span>
                                                </div>
                                            @endif
                                            </div>
                                            <!-- /.product-list -->
                                        </div>
                                        <!-- /.products -->
                                    </div>
                                    <!-- /.category-product-inner -->
                                    @endforeach





                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->
                        <div class="clearfix filters-container">
                            <div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                       {{$products->links()}}
                                    </ul>
                                    <!-- /.list-inline -->
                                </div>
                                <!-- /.pagination-container -->
                            </div>
                            <!-- /.text-right -->

                        </div>
                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.col -->
            </div>














            @include('frontend.body.brands')
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>



@endsection
