@extends('frontend.main_master')

@section('title', 'Home')

@section('content')



    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('frontend.body.vertical_menu')


                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->

                    <!-- ============================================== HOT DEALS ============================================== -->
                    <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">hot deals</h3>
                        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

                            @forelse ($hot_deals as $hot_deal)
                                <div class="item">
                                    <div class="products">
                                        <div class="hot-deal-wrapper">
                                            <div class="image"> <img
                                                    src="{{ asset($hot_deal->product_thumbnail) }}" alt=""> </div>
                                            @php
                                                $dis_amount = $hot_deal->selling_price - $hot_deal->discount_price;
                                                $discount_percent = round(($dis_amount / $hot_deal->selling_price) * 100);
                                            @endphp

                                            @if ($dis_amount == null)
                                                <div class="tag new"><span>new</span></div>
                                            @else

                                                <div class="sale-offer-tag"> <span>{{ $discount_percent }}%<br> off</span>
                                                </div>
                                            @endif

                                            <div class="timing-wrapper">
                                                <div class="box-wrapper">
                                                    <div class="date box"> <span class="key">120</span>
                                                        <span class="value">DAYS</span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper">
                                                    <div class="hour box"> <span class="key">20</span>
                                                        <span class="value">HRS</span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper">
                                                    <div class="minutes box"> <span class="key">36</span>
                                                        <span class="value">MINS</span>
                                                    </div>
                                                </div>
                                                <div class="box-wrapper hidden-md">
                                                    <div class="seconds box"> <span class="key">60</span>
                                                        <span class="value">SEC</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.hot-deal-wrapper -->

                                        <div class="product-info text-left m-t-20">
                                            <h3 class="name"><a
                                                    href="{{ url('product/details/' . $hot_deal->id . '/' . $hot_deal->product_slug_en) }}">

                                                    @if (session()->get('language') == 'hindi')
                                                        {{ $hot_deal->product_name_hin }}
                                                    @else
                                                        {{ $hot_deal->product_name_en }}
                                                    @endif

                                                </a></h3>
                                            <div class="rating rateit-small"></div>





                                            <div class="product-price">
                                                @if ($hot_deal->discount_price == null)

                                                    <span class="price"> {{ $hot_deal->selling_price }} </span>

                                                @else
                                                    <span class="price"> {{ $hot_deal->discount_price }} </span>
                                                    <span
                                                        class="price-before-discount">{{ $hot_deal->selling_price }}</span>
                                                @endif

                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->

                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <div class="add-cart-button btn-group">
                                                    <button class="btn btn-primary icon" data-toggle="modal" data-target="#exampleModal"  id="{{ $hot_deal->id }}" onclick="productView(this.id)"
                                                        type="button">
                                                        <i class="fa fa-shopping-cart"></i> </button>
                                                    <button class="btn btn-primary cart-btn" type="button" data-toggle="modal" data-target="#exampleModal"  id="{{ $hot_deal->id }}" onclick="productView(this.id)">Add to
                                                        cart</button>
                                                </div>
                                            </div>
                                            <!-- /.action -->
                                        </div>
                                        <!-- /.cart -->
                                    </div>
                                </div>
                            @empty
                                <h4 class="text-danger">No Product Found</h4>
                            @endforelse



                        </div>
                        <!-- /.sidebar-widget -->
                    </div>
                    <!-- ============================================== HOT DEALS: END ============================================== -->

                    <!-- ============================================== SPECIAL OFFER ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Special Offer</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

                                <div class="item">
                                    <div class="products special-product">

                                        @forelse ($special_offers as $special_offer)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a
                                                                        href="{{ url('product/details/' . $special_offer->id . '/' . $special_offer->product_slug_en) }}">
                                                                        <img src="{{ asset($special_offer->product_thumbnail) }}"
                                                                            alt=""> </a> </div>
                                                                <!-- /.image -->

                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product/details/' . $special_offer->id . '/' . $special_offer->product_slug_en) }}">

                                                                        @if (session()->get('language') == 'hindi')
                                                                            {{ $special_offer->product_name_hin }}
                                                                        @else
                                                                            {{ $special_offer->product_name_en }}
                                                                        @endif
                                                                    </a>
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> <span class="price">
                                                                        {{ $special_offer->discount_price }} </span>
                                                                </div>
                                                                <!-- /.product-price -->

                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->

                                            </div>
                                        @empty
                                            <h4 class="text-danger">No Product Found</h4>
                                        @endforelse


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->
                    <!-- ============================================== PRODUCT TAGS ============================================== -->


@include('frontend.body.product_tags')

                    <!-- /.sidebar-widget -->
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    <!-- ============================================== SPECIAL DEALS ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">Special Deals</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">

                                        @forelse ($special_deals as $special_deal)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image"> <a
                                                                        href="{{ url('product/details/' . $special_deal->id . '/' . $special_deal->product_slug_en) }}">
                                                                        <img src="{{ asset($special_deal->product_thumbnail) }}"
                                                                            alt=""> </a> </div>
                                                                <!-- /.image -->

                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name"><a
                                                                        href="{{ url('product/details/' . $special_deal->id . '/' . $special_deal->product_slug_en) }}">

                                                                        @if (session()->get('language') == 'hindi')
                                                                            {{ $special_deal->product_name_hin }}
                                                                        @else
                                                                            {{ $special_deal->product_name_en }}
                                                                        @endif

                                                                    </a>
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price"> <span class="price">
                                                                        {{ $special_deal->discount_price }} </span> </div>
                                                                <!-- /.product-price -->

                                                            </div>
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-micro-row -->
                                                </div>
                                                <!-- /.product-micro -->

                                            </div>
                                        @empty
                                            <h4 class="text-danger">No Product Found</h4>
                                        @endforelse


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
@include('frontend.body.testemonial')

                    <!-- ============================================== Testimonials: END ============================================== -->

                    <div class="home-banner"> <img src="/frontend/assets/images/banners/LHS-banner.jpg" alt="Image">
                    </div>
                </div>
                <!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                            @foreach ($sliders as $sliders)


                                <div class="item"
                                    style="background-image: url({{ asset($sliders->slider_img) }});">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">
                                            <div class="slider-header fadeInDown-1">{{ $sliders->title }}</div>
                                            <div>
                                                <h4>New Collection</h4>
                                            </div>
                                            <div class="excerpt fadeInDown-2 hidden-xs"> <span>
                                                    {{ $sliders->description }}
                                                </span> </div>
                                            <div class="button-holder fadeInDown-3"> <a href=""
                                                    class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop
                                                    Now</a>
                                            </div>
                                        </div>
                                        <!-- /.caption -->
                                    </div>
                                    <!-- /.container-fluid -->
                                </div>
                                <!-- /.item -->
                            @endforeach




                        </div>
                        <!-- /.owl-carousel -->
                    </div>

                    <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div>
                                <!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div>
                                <!-- .col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.info-boxes-inner -->

                    </div>
                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">New Products</h3>
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">

                                <li class="active"><a data-transition-type="backSlide" href="#all"
                                        data-toggle="tab">All</a></li>



                                @foreach ($cata as $cata)

                                    <li><a data-transition-type="backSlide" href="#catagory{{ $cata->id }}"
                                            data-toggle="tab">


                                            @if (session()->get('language') == 'hindi')
                                                {{ $cata->catagory_name_hin }}
                                            @else
                                                {{ $cata->catagory_name_en }}
                                            @endif
                                        </a>
                                    </li>

                                @endforeach


                                {{-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a>
                                </li>
                                <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> --}}
                            </ul>
                            <!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                        @foreach ($products as $products)


                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image"> <a
                                                                    href="{{ url('product/details/' . $products->id . '/' . $products->product_slug_en) }}"><img
                                                                        src="{{ asset($products->product_thumbnail) }}"
                                                                        alt=""></a> </div>
                                                            <!-- /.image -->

                                                            @php
                                                                $amount = $products->selling_price - $products->discount_price;
                                                                $discount = round(($amount / $products->selling_price) * 100);
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
                                                            <h3 class="name"><a
                                                                    href="{{ url('product/details/' . $products->id . '/' . $products->product_slug_en) }}">
                                                                    @if (session()->get('language') == 'hindi')
                                                                        {{ $products->product_name_hin }}
                                                                    @else
                                                                        {{ $products->product_name_en }}
                                                                    @endif



                                                                </a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    ${{ $products->discount_price }}
                                                                </span> <span class="price-before-discount">$
                                                                    {{ $products->selling_price }}</span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button
                                    class="btn btn-primary icon" type="button"
                                    title="Add Cart" data-toggle="modal" data-target="#exampleModal"  id="{{ $products->id }}" onclick="productView(this.id)"> <i
                                        class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn"
                                    type="button" >Add to cart</button>
                            </li>
                            <li class="lnk wishlist"> <a data-toggle="tooltip"
                                    class="add-to-cart" href="detail.html"
                                    title="Wishlist"> <i
                                        class="icon fa fa-heart"></i>
                                </a> </li>
                            <li class="lnk"> <a data-toggle="tooltip"
                                    class="add-to-cart" href="detail.html"
                                    title="Compare"> <i class="fa fa-signal"
                                        aria-hidden="true"></i> </a> </li>
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
                                        @endforeach
                                        <!-- /.item -->


                                        <!-- /.item -->
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->

                            @foreach ($allcata as $allcata)



                                <div class="tab-pane" id="catagory{{ $allcata->id }}">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                            @php
                                                $cataWisePdt = App\Models\Product::where('category_id', $allcata->id)
                                                    ->where('status', 0)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();

                                            @endphp

                                            @forelse ($cataWisePdt as $cataWisePdt)
                                                <div class="item item-carousel">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image"> <a
                                                                        href="{{ url('product/details/' . $cataWisePdt->id . '/' . $cataWisePdt->product_slug_en) }}"><img
                                                                            src="{{ asset($cataWisePdt->product_thumbnail) }}"
                                                                            alt=""></a> </div>
                                                                <!-- /.image -->

                                                                @php
                                                                    $amount = $cataWisePdt->selling_price - $cataWisePdt->discount_price;
                                                                    $discount = round(($amount / $cataWisePdt->selling_price) * 100);
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
                                                                <h3 class="name"><a
                                                                        href="{{ url('product/details/' . $cataWisePdt->id . '/' . $cataWisePdt->product_slug_en) }}">
                                                                        @if (session()->get('language') == 'hindi')
                                                                            {{ $cataWisePdt->product_name_hin }}
                                                                        @else
                                                                            {{ $cataWisePdt->product_name_en }}
                                                                        @endif
                                                                    </a></h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="description"></div>
                                                                <div class="product-price"> <span class="price">
                                                                        ${{ $cataWisePdt->discount_price }}
                                                                    </span> <span class="price-before-discount">$
                                                                        {{ $cataWisePdt->selling_price }}</span> </div>
                                                                <!-- /.product-price -->

                                                            </div>
                                                            <!-- /.product-info -->
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                            <button class="btn btn-primary icon"
                                            data-toggle="modal" data-target="#exampleModal"  id="{{ $cataWisePdt->id }}" onclick="productView(this.id)"> <i
                                                    class="fa fa-shopping-cart" ></i>
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
                                                                                title="Compare"> <i class="fa fa-signal"
                                                                                    aria-hidden="true"></i>
                                                                            </a> </li>
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
                                            @empty
                                                <h5 class="text-danger">No Product Found</h5>
                                            @endforelse



                                        </div>
                                        <!-- /.home-owl-carousel -->
                                    </div>
                                    <!-- /.product-slider -->
                                </div>

                            @endforeach
                            <!-- /.tab-pane -->



                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.scroll-tabs -->
                    <!-- ============================================== SCROLL TABS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="/frontend/assets/images/banners/home-banner1.jpg" alt=""> </div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-5 col-sm-5">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="/frontend/assets/images/banners/home-banner2.jpg" alt=""> </div>
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.wide-banners -->

                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">Featured products</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                            @forelse ($features as $feature)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a
                                                        href="{{ url('product/details/' . $feature->id . '/' . $feature->product_slug_en) }}"><img
                                                            src="{{ asset($feature->product_thumbnail) }}" alt=""></a>
                                                </div>
                                                <!-- /.image -->

                                                @php
                                                    $dis_amnt = $feature->selling_price - $feature->discount_price;
                                                    $percent = round(($dis_amnt / $feature->selling_price) * 100);
                                                @endphp

                                                @if ($percent == null)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{ $percent }}%</span></div>
                                                @endif



                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a
                                                        href="{{ url('product/details/' . $feature->id . '/' . $feature->product_slug_en) }}">
                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $feature->product_name_hin }}
                                                        @else
                                                            {{ $feature->product_name_en }}
                                                        @endif

                                                    </a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>



                                                <div class="product-price">
                                                    @if ($feature->discount_price == null)
                                                        <span class="price">
                                                            {{ $feature->selling_price }}
                                                        @else
                                                            <span class="price">$
                                                                {{ $feature->discount_price }}
                                                            </span>
                                                            <span class="price-before-discount">$
                                                                {{ $feature->selling_price }}</span>
                                                    @endif

                                                </div>

                                                <!-- /.product-price -->







                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
        <button type="button" class="btn btn-primary icon" data-toggle="modal" data-target="#exampleModal"  id="{{ $feature->id }}" onclick="productView(this.id)"
            > <i class="fa fa-shopping-cart"></i>
        </button>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to
                                                                cart</button>
                                                        </li>
                                                        <li class="lnk wishlist"> <a class="add-to-cart"
                                                                href="detail.html" title="Wishlist"> <i
                                                                    class="icon fa fa-heart"></i> </a> </li>
                                                        <li class="lnk"> <a class="add-to-cart"
                                                                href="detail.html" title="Compare"> <i
                                                                    class="fa fa-signal" aria-hidden="true"></i> </a>
                                                        </li>
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
                            @empty
                                <h4 class="text-danger">No Product Found</h4>

                            @endforelse


                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.Featured Produc End -->


                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            @if (session()->get('language') == 'hindi')

                                {{ $skip_cate_0->catagory_name_hin }}
                            @else
                                {{ $skip_cate_0->catagory_name_en }}
                            @endif

                        </h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                            @forelse ($skip_product_0 as $feature)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a
                                                        href="{{ url('product/details/' . $feature->id . '/' . $feature->product_slug_en) }}"><img
                                                            src="{{ asset($feature->product_thumbnail) }}" alt=""></a>
                                                </div>
                                                <!-- /.image -->

                                                @php
                                                    $dis_amnt = $feature->selling_price - $feature->discount_price;
                                                    $percent = round(($dis_amnt / $feature->selling_price) * 100);
                                                @endphp

                                                @if ($percent == null)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{ $percent }}%</span></div>
                                                @endif



                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a
                                                        href="{{ url('product/details/' . $feature->id . '/' . $feature->product_slug_en) }}">
                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $feature->product_name_hin }}
                                                        @else
                                                            {{ $feature->product_name_en }}
                                                        @endif

                                                    </a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>



                                                <div class="product-price">
                                                    @if ($feature->discount_price == null)
                                                        <span class="price">
                                                            {{ $feature->selling_price }}
                                                        @else
                                                            <span class="price">$
                                                                {{ $feature->discount_price }}
                                                            </span>
                                                            <span class="price-before-discount">$
                                                                {{ $feature->selling_price }}</span>
                                                    @endif

                                                </div>

                                                <!-- /.product-price -->







                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" data-toggle="modal" data-target="#exampleModal"  id="{{ $feature->id }}" onclick="productView(this.id)"
                                                                type="button"> <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to
                                                                cart</button>
                                                        </li>
                                                        <li class="lnk wishlist"> <a class="add-to-cart"
                                                                href="detail.html" title="Wishlist"> <i
                                                                    class="icon fa fa-heart"></i> </a> </li>
                                                        <li class="lnk"> <a class="add-to-cart"
                                                                href="detail.html" title="Compare"> <i
                                                                    class="fa fa-signal" aria-hidden="true"></i> </a>
                                                        </li>
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
                            @empty
                                <h4 class="text-danger">No Product Found</h4>

                            @endforelse


                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.Skip category 0 End -->

                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            @if (session()->get('language') == 'hindi')

                                {{ $skip_cate_1->catagory_name_hin }}
                            @else
                                {{ $skip_cate_1->catagory_name_en }}
                            @endif

                        </h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                            @forelse ($skip_product_1 as $feature)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a
                                                        href="{{ url('product/details/' . $feature->id . '/' . $feature->product_slug_en) }}"><img
                                                            src="{{ asset($feature->product_thumbnail) }}" alt=""></a>
                                                </div>
                                                <!-- /.image -->

                                                @php
                                                    $dis_amnt = $feature->selling_price - $feature->discount_price;
                                                    $percent = round(($dis_amnt / $feature->selling_price) * 100);
                                                @endphp

                                                @if ($percent == null)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{ $percent }}%</span></div>
                                                @endif



                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a
                                                        href="{{ url('product/details/' . $feature->id . '/' . $feature->product_slug_en) }}">
                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $feature->product_name_hin }}
                                                        @else
                                                            {{ $feature->product_name_en }}
                                                        @endif

                                                    </a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>



                                                <div class="product-price">
                                                    @if ($feature->discount_price == null)
                                                        <span class="price">
                                                            {{ $feature->selling_price }}
                                                        @else
                                                            <span class="price">$
                                                                {{ $feature->discount_price }}
                                                            </span>
                                                            <span class="price-before-discount">$
                                                                {{ $feature->selling_price }}</span>
                                                    @endif

                                                </div>

                                                <!-- /.product-price -->







                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" data-toggle="modal" data-target="#exampleModal"  id="{{ $feature->id }}" onclick="productView(this.id)"
                                                                type="button"> <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to
                                                                cart</button>
                                                        </li>
                                                        <li class="lnk wishlist"> <a class="add-to-cart"
                                                                href="detail.html" title="Wishlist"> <i
                                                                    class="icon fa fa-heart"></i> </a> </li>
                                                        <li class="lnk"> <a class="add-to-cart"
                                                                href="detail.html" title="Compare"> <i
                                                                    class="fa fa-signal" aria-hidden="true"></i> </a>
                                                        </li>
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
                            @empty
                                <h4 class="text-danger">No Product Found</h4>

                            @endforelse


                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.Skip Category 1 End -->



                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image"> <img class="img-responsive"
                                            src="/frontend/assets/images/banners/home-banner.jpg" alt=""> </div>
                                    <div class="strip strip-text">
                                        <div class="strip-inner">
                                            <h2 class="text-right">New Mens Fashion<br>
                                                <span class="shopping-needs">Save up to 40% off</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="new-label">
                                        <div class="text">NEW</div>
                                    </div>
                                    <!-- /.new-label -->
                                </div>
                                <!-- /.wide-banner -->
                            </div>
                            <!-- /.col -->

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.wide-banners -->
                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            @if (session()->get('language') == 'hindi')

                                {{ $skip_brand_0->brand_name_hin }}
                            @else
                                {{ $skip_brand_0->brand_name_en }}
                            @endif

                        </h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                            @forelse ($skip_brand_product_0 as $feature)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image"> <a
                                                        href="{{ url('product/details/' . $feature->id . '/' . $feature->product_slug_en) }}"><img
                                                            src="{{ asset($feature->product_thumbnail) }}" alt=""></a>
                                                </div>
                                                <!-- /.image -->

                                                @php
                                                    $dis_amnt = $feature->selling_price - $feature->discount_price;
                                                    $percent = round(($dis_amnt / $feature->selling_price) * 100);
                                                @endphp

                                                @if ($percent == null)
                                                    <div class="tag new"><span>new</span></div>
                                                @else
                                                    <div class="tag hot"><span>{{ $percent }}%</span></div>
                                                @endif



                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name"><a
                                                        href="{{ url('product/details/' . $feature->id . '/' . $feature->product_slug_en) }}">
                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $feature->product_name_hin }}
                                                        @else
                                                            {{ $feature->product_name_en }}
                                                        @endif

                                                    </a>
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>



                                                <div class="product-price">
                                                    @if ($feature->discount_price == null)
                                                        <span class="price">
                                                            {{ $feature->selling_price }}
                                                        @else
                                                            <span class="price">$
                                                                {{ $feature->discount_price }}
                                                            </span>
                                                            <span class="price-before-discount">$
                                                                {{ $feature->selling_price }}</span>
                                                    @endif

                                                </div>

                                                <!-- /.product-price -->







                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" data-toggle="dropdown"
                                                                type="button"> <i class="fa fa-shopping-cart"></i>
                                                            </button>
                                                            <button class="btn btn-primary cart-btn" type="button">Add to
                                                                cart</button>
                                                        </li>
                                                        <li class="lnk wishlist"> <a class="add-to-cart"
                                                                href="detail.html" title="Wishlist"> <i
                                                                    class="icon fa fa-heart"></i> </a> </li>
                                                        <li class="lnk"> <a class="add-to-cart"
                                                                href="detail.html" title="Compare"> <i
                                                                    class="fa fa-signal" aria-hidden="true"></i> </a>
                                                        </li>
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
                            @empty
                                <h4 class="text-danger">No Product Found</h4>

                            @endforelse


                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.Skip Brand 0 End -->





                    <!-- ============================================== BEST SELLER ============================================== -->

                    <div class="best-deal wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">Best seller</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="/frontend/assets/images/products/p20.jpg"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="/frontend/assets/images/products/p21.jpg"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="/frontend/assets/images/products/p22.jpg"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="/frontend/assets/images/products/p23.jpg"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="/frontend/assets/images/products/p24.jpg"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="/frontend/assets/images/products/p25.jpg"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="/frontend/assets/images/products/p26.jpg"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image"> <a href="#"> <img
                                                                        src="/frontend/assets/images/products/p27.jpg"
                                                                        alt=""> </a> </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print
                                                                    Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price"> <span class="price">
                                                                    $450.99 </span> </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.product-micro-row -->
                                            </div>
                                            <!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.sidebar-widget-body -->
                    </div>
                    <!-- /.sidebar-widget -->
                    <!-- ============================================== BEST SELLER : END ============================================== -->

                    <!-- ============================================== BLOG SLIDER ============================================== -->
                    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                        <h3 class="section-title">latest form blog</h3>
                        <div class="blog-slider-container outer-top-xs">
                            <div class="owl-carousel blog-slider custom-carousel">
                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="/frontend/assets/images/blog-post/post1.jpg" alt=""></a> </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Voluptatem accusantium doloremque
                                                    laudantium</a></h3>
                                            <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed quia non numquam eius modi tempora incidunt ut
                                                labore et dolore magnam aliquam quaerat voluptatem.</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="/frontend/assets/images/blog-post/post2.jpg" alt=""></a> </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                    pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016
                                            </span>
                                            <p class="text">Sed quia non numquam eius modi tempora incidunt ut
                                                labore et dolore magnam aliquam quaerat voluptatem.</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="/frontend/assets/images/blog-post/post1.jpg" alt=""></a> </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                    pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016
                                            </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="/frontend/assets/images/blog-post/post2.jpg" alt=""></a> </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                    pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016
                                            </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image"> <a href="blog.html"><img
                                                        src="/frontend/assets/images/blog-post/post1.jpg" alt=""></a> </div>
                                        </div>
                                        <!-- /.blog-post-image -->

                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla
                                                    pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016
                                            </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit
                                                voluptatem accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div>
                                        <!-- /.blog-post-info -->

                                    </div>
                                    <!-- /.blog-post -->
                                </div>
                                <!-- /.item -->

                            </div>
                            <!-- /.owl-carousel -->
                        </div>
                        <!-- /.blog-slider-container -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== BLOG SLIDER : END ============================================== -->

                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section wow fadeInUp new-arriavls">
                        <h3 class="section-title">New Arrivals</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="/frontend/assets/images/products/p19.jpg" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                                <span class="price-before-discount">$ 800</span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                            href="detail.html" title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                                aria-hidden="true"></i> </a> </li>
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

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="/frontend/assets/images/products/p28.jpg" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                                <span class="price-before-discount">$ 800</span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                            href="detail.html" title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                                aria-hidden="true"></i> </a> </li>
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

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="/frontend/assets/images/products/p30.jpg" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag hot"><span>hot</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                                <span class="price-before-discount">$ 800</span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                            href="detail.html" title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                                aria-hidden="true"></i> </a> </li>
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

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="/frontend/assets/images/products/p1.jpg" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag hot"><span>hot</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                                <span class="price-before-discount">$ 800</span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                            href="detail.html" title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                                aria-hidden="true"></i> </a> </li>
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

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="/frontend/assets/images/products/p2.jpg" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                                <span class="price-before-discount">$ 800</span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                            href="detail.html" title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                                aria-hidden="true"></i> </a> </li>
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

                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="/frontend/assets/images/products/p3.jpg" alt=""></a> </div>
                                            <!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div>
                                        <!-- /.product-image -->

                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price"> <span class="price"> $450.99 </span>
                                                <span class="price-before-discount">$ 800</span>
                                            </div>
                                            <!-- /.product-price -->

                                        </div>
                                        <!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to
                                                            cart</button>
                                                    </li>
                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                            href="detail.html" title="Wishlist"> <i
                                                                class="icon fa fa-heart"></i> </a> </li>
                                                    <li class="lnk"> <a class="add-to-cart"
                                                            href="detail.html" title="Compare"> <i class="fa fa-signal"
                                                                aria-hidden="true"></i> </a> </li>
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
                        </div>
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

                </div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            @include('frontend.body.brands')
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->
    </div>



@endsection
