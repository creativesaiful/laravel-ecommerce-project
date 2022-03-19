@extends('frontend.main_master')
@section('title', 'Order details')

@section('content')

    <div class="body-content outer-top-xs outer-bottom-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">>
			 @include('frontend.user_navbar')

       <div class="col-md-2">
       </div>

       <div class="col-md-8">

        <div class="table-responsive">
          <table class="table">
            <tbody>

              <tr style="background: #e2e2e2;">
                <td class="col-md-1">
                  <label for=""> Date</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Total</label>
                </td>

                <td class="col-md-3">
                  <label for=""> Payment</label>
                </td>


                <td class="col-md-2">
                  <label for=""> Invoice</label>
                </td>

                 <td class="col-md-2">
                  <label for=""> Order</label>
                </td>

                 <td class="col-md-1">
                  <label for=""> Action </label>
                </td>

              </tr>


              @foreach($orders as $order)
       <tr>
                <td class="col-md-1">
                  <label for=""> {{ $order->order_date }}</label>
                </td>

                <td class="col-md-3">
                  <label for=""> ${{ $order->amount }}</label>
                </td>


                 <td class="col-md-3">
                  <label for=""> {{ $order->payment_method }}</label>
                </td>

                <td class="col-md-2">
                  <label for=""> {{ $order->invoice_no }}</label>
                </td>

                 <td class="col-md-2">
                  <label for="">
                    <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span>

                    <span class="badge badge-pill badge-warning" style="background:red;">Return Requested </span>

                    </label>
                </td>

         <td class="col-md-1">
          <a href="{{ url('order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

           <a target="_blank" href="{{ url('invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>

        </td>

              </tr>
              @endforeach





            </tbody>

          </table>

        </div>





       </div> <!-- / end col md 8 -->





		</div> <!-- // end row -->

	</div>

</div>


@endsection
