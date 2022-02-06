<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @php
                $catagory =  App\Models\Catagory::orderBy('catagory_name_en', 'ASC')->get();
            @endphp

            @foreach ($catagory as $catagory)


                <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle"
                        data-toggle="dropdown"><i class="icon {{ $catagory->catagory_icon }}"
                            aria-hidden="true"></i>

                        @if (session()->get('language') == 'hindi')
                            {{ $catagory->catagory_name_hin }}
                        @else
                            {{ $catagory->catagory_name_en }}
                        @endif
                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                @php
                                    $sub_category = App\Models\Subcata::where('category_id', $catagory->id)
                                        ->orderBy('subcata_name_en', 'ASC')
                                        ->get();

                                @endphp

                                @foreach ($sub_category as $sub_category)
                                    <div class="col-sm-12 col-md-3">
                                        <h2 class="title">
                                            @if (session()->get('language') == 'hindi')
                                                {{ $sub_category->subcata_name_hin }}
                                            @else
                                                {{ $sub_category->subcata_name_en }}
                                            @endif
                                        </h2>



                                        @php
                                            $subsubcategory = App\Models\Subsubcate::where('sub_category_id', $sub_category->id)
                                                ->orderBy('subsubcata_name_en', 'ASC')
                                                ->get();
                                        @endphp


                                        @foreach ($subsubcategory as $subsubcategory)
                                            <ul class="links list-unstyled">
                                                <li><a href="#">
                                                        @if (session()->get('language') == 'hindi')
                                                            {{ $subsubcategory->subsubcata_name_hin }}
                                                        @else
                                                            {{ $subsubcategory->subsubcata_name_en }}
                                                        @endif
                                                    </a></li>

                                            </ul>
                                        @endforeach
                                    </div>

                                @endforeach

                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.menu-item -->
            @endforeach


        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
