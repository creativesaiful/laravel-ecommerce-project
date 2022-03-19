<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function ReportView(){

        return view('backend.report.report_view');
    }

    public function ReportByDate(Request $request){
        // return $request->all();
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        // return $formatDate;
        $orders = Order::where('order_date',$formatDate)->latest()->get();

        return view('backend.report.report_show',compact('orders'));

    }

    public function ReportByMonth(Request $request){

        $orders = Order::where('order_month',$request->month)->where('order_year',$request->year_name)->latest()->get();
        return view('backend.report.report_show',compact('orders'));

    } // end mehtod


       public function ReportByYear(Request $request){

        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('backend.report.report_show',compact('orders'));

    } // end mehtod

}
