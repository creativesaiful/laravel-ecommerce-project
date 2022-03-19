<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class AllUserControlle extends Controller
{

    public function MyOrders(){

    	$orders = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
    	return view('frontend.order.order_view',compact('orders'));

    }//end of MyOrders

    public function OrderDetails($order_id){

    	$order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
    	$orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
    	return view('frontend.order.order_details',compact('order','orderItem'));

    } // end mehtod

    public function InvoiceDownload($order_id){
        $order = Order::with('division','district','state','user')->where('id',$order_id)->where('user_id',Auth::id())->first();
         $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();

         //pdf generate
         $pdf = PDF::loadView('frontend.order.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
    ]);
    return $pdf->download('invoice.pdf');




     } // end mehtod


    public function ReturnOrder(Request $request,$order_id){

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);


      $notification = array(
            'message' => 'Return Request Send Successfully',
            'type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);

    } // end method

    public function ReturnOrderList(){

        $orders = Order::where('user_id',Auth::id())->where('return_reason','!=',NULL)->orderBy('id','DESC')->get();
        return view('frontend.order.return_order_view',compact('orders'));

    } // end method

    public function CancelOrders(){

        $orders = Order::where('user_id',Auth::id())->where('status','cancel')->orderBy('id','DESC')->get();
        return view('frontend.order.cancel_order_view',compact('orders'));

    } // end method



}
