@php
    $prefix = Request::route()->getPrefix();

    $route = Route::current()->getName();

    echo ($route);
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Ecommerce</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{$route == 'admin.dashboard' ? 'active' : ''}}">

                <a href="{{route('admin.dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{$prefix == '/brand' ? 'active' : ''}}">
                <a href="#" >
                    <i data-feather="message-circle"></i>
                    <span>Brands </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu ">
                    <li class="{{$route == 'brand.view' ? 'active' : ''}}"><a href="{{route('brand.view')}}"><i class="ti-more"></i>All Brands</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="briefcase"></i> <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$route== 'catagory.view' ? 'active' : ''}}" ><a href="{{route('catagory.view')}}"><i class="ti-more"></i>Categories</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="briefcase"></i> <span>Sub Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$route == 'subcata.view' ? 'active' : ''}}"><a href="{{route('subcata.view')}}"><i class="ti-more"></i>Sub Categories</a></li>


                    <li class="{{$route == 'subsubcata.view' ? 'active' : ''}}" ><a href="{{route('subsubcata.view')}}"><i class="ti-more"></i>Sub Sub Categories</a></li>

                </ul>




            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$route == 'product.create' ? 'active' :''}}" ><a href="{{route('product.create')}}"><i class="ti-more"></i>Add Products</a></li>
                    <li class="{{$route == 'product.view' ? 'active' : ''}}" ><a href="{{route('product.view')}}"><i class="ti-more"></i>Manage Products</a></li>

                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupon</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$route == 'manage.coupon' ? 'active' :''}}" ><a href="{{route('manage.coupon')}}"><i class="ti-more"></i>Coupon Genereate</a></li>


                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipping</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$route == 'manage-division' ? 'active' :''}}" ><a href="{{route('manage-division')}}"><i class="ti-more"></i> Division Manage</a></li>


                    <li class="{{$route == 'manage-district' ? 'active' :''}}" ><a href="{{route('manage-district')}}"><i class="ti-more"></i> District Manage</a></li>

                    <li class="{{$route == 'manage-state' ? 'active' :''}}" ><a href="{{route('manage-state')}}"><i class="ti-more"></i> State Manage</a></li>







                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$route == 'slider.view' ? 'active' :''}}" ><a href="{{route('slider.view')}}"><i class="ti-more"></i>Manage Slider</a></li>


                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$route == 'order.pending' ? 'active' :''}}" ><a href="{{route('order.pending')}}"><i class="ti-more"></i>Pending Order</a></li>
                    <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>

                    <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>

                  <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Orders</a></li>

                  <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Shipped Orders</a></li>

                 <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>

              <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Cancel Orders</a></li>


                </ul>
            </li>







            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                    <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
                    <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
                    <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
                    <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
                    <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>










        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
