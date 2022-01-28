@extends('admin.admin_master')

@section('title', 'Product View')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">




            <div class="col-md-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name English</th>
                                        <th>Product Price</th>
                                        <th>Quantity</th>
                                        <th>Discount</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($productInfo as $productInfo)
                                        <tr>
                                            <td><img style="width: 80px" src="{{asset($productInfo->product_thumbnail)}}" alt=""></td>
                                            <td>{{ $productInfo->product_name_en }}</td>
                                            <td>{{ $productInfo->selling_price }}</td>
                                            <td>{{ $productInfo->product_qty }}</td>
                                            <td>

                                                @if ($productInfo->discount_price==NULL)
                                                <span>Not Discount</span>
                                                @else
                                                @php
                                                    $disAmount = ($productInfo->selling_price-$productInfo->discount_price);
                                                    $percent = round(($disAmount/$productInfo->selling_price)*100)
                                                @endphp


                                                 <span class="badge badge-pill badge-danger">{{$percent}}%</span>
                                                @endif

                                            </td>

                                            <td>


                                                    @if ($productInfo->status==0)
                                                    <span class="badge badge-pill badge-success">Active</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">Inactive</span>
                                                    @endif


                                            </td>

                                            <td>



                                            <a href="{{ route('product.edit', $productInfo->id) }}"
                                                class="btn btn-info" title="Edit Product"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('product.delete', $productInfo->id) }}"
                                                class="btn btn-danger delete" title="Delete product"><i class="fa fa-trash"></i></a>

                                                @if ($productInfo->status==0)
                                                <a href="{{ route('product.inactive', $productInfo->id) }}"
                                                    class="btn btn-info" title="Incitve Product"><i class="fa fa-arrow-down"></i></a>
                                                @else
                                                <a href="{{ route('product.active', $productInfo->id) }}"
                                                    class="btn btn-info" title="Active Product"><i class="fa fa-arrow-up"></i></a>
                                                @endif

                                            </td>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>



            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->



@endsection
