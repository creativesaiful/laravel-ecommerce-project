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
                                        <th>Product Name hindi</th>
                                        <th>Quantity</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($productInfo as $productInfo)
                                        <tr>
                                            <td><img style="width: 80px" src="{{asset($productInfo->product_thumbnail)}}" alt=""></td>
                                            <td>{{ $productInfo->product_name_en }}</td>
                                            <td>{{ $productInfo->product_name_hin }}</td>
                                            <td>{{ $productInfo->product_qty }}</td>

                                            <td>
                                            <a href="{{ route('product.edit', $productInfo->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ route('product.delete', $productInfo->id) }}"
                                                class="btn btn-danger delete">Delete</a>

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
