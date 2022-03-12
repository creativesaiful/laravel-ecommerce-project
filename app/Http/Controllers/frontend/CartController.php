<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Models\ShipDivision;
class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {

        $product =  Product::findOrFail($id);

        $product_name = $product->product_name_en;

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'size' => $request->size,
                    'color' => $request->color,
                    'image' => $product->product_thumbnail,

                ]
            ]);

            return response()->json(['success' => 'Product added to cart successfully!']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'size' => $request->size,
                    'color' => $request->color,
                    'image' => $product->product_thumbnail,

                ]
            ]);

            return response()->json(['success' => 'Product added to cart successfully!']);
        }
    }//end of AddToCart

    public function MiniCartData(){
        $cart = Cart::content();
        $cart_count = Cart::count();
        $cart_total = Cart::total();

        return response()->json(['cart'=>$cart,'cart_count'=>$cart_count,'cart_total'=>$cart_total]);
    }//end of MiniCartData

    public function MiniCartDataRemove($rowID){
        Cart::remove($rowID);
        return response()->json(['success'=>'Product removed from cart successfully!']);
    }//end of MiniCartDataRemove


    public function CartPageView(){

        if(Auth::check() && Auth::user()){
            return view('frontend.product.cart_page');
        }else{
            return redirect()->route('login');
        }


    }//end of CartView


    public function CartPageData(){
        $cart = Cart::content();
        $cart_count = Cart::count();
        $cart_total = Cart::total();
        $sub_total = Cart::subtotal();

        return response()->json(['cart'=>$cart,'cart_count'=>$cart_count,'cart_total'=>$cart_total, 'sub_total'=>$sub_total]);
    }//end of CartPageData


    public function RemoveCartItemFromCartPage($rowId){

        Cart::remove($rowId);
        return response()->json('deleted');
    }//end of RemoveCartItemFromCartPage


    public function CartIncrement($rowId){

       $row =  Cart::get($rowId);

        Cart::update($rowId, $row->qty+1);
        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();
            $total = (int)str_replace(',','',Cart::total());

           Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round($total * $coupon->coupon_discount/100),
                'total_amount' => round($total- $total * $coupon->coupon_discount/100)
            ]);
            return response()->json('decremented');
        }else{
            return response()->json('decremented');
        }



        return response()->json('incremented');
    }//end of Cart Increment

    public function CartDecrement($rowId){

        $row =  Cart::get($rowId);

        if($row->qty>1){
            Cart::update($rowId, $row->qty-1);

            if (Session::has('coupon')) {

                $coupon_name = Session::get('coupon')['coupon_name'];
                $coupon = Coupon::where('coupon_name',$coupon_name)->first();
                $total = (int)str_replace(',','',Cart::total());

               Session::put('coupon',[
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount' => round($total * $coupon->coupon_discount/100),
                    'total_amount' => round($total- $total * $coupon->coupon_discount/100)
                ]);
                return response()->json('decremented');
            }else{
                return response()->json('decremented');
            }



        }else{
            return response()->json(['error'=>'Minimum quantity is 1']);
        }
    }//end of Cart Decrement




    public function CouponApply(Request $request){

        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        if ($coupon) {


       $total = (int)str_replace(',','',Cart::total());

            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round($total * $coupon->coupon_discount/100),
                'total_amount' => round($total - $total * $coupon->coupon_discount/100)
            ]);

            return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Successfully'
            ));

        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }

    } // end method


    public function CouponCalculation(){



        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));

        }
    } // end method


 // Remove Coupon
    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Successfully']);
    }



 // Checkout Method
    public function CheckoutCreate(){

        if (Auth::check()) {
            if (Cart::total() > 0) {

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divisions'));

            }else{

            $notification = array(
            'message' => 'Shopping At list One Product',
            'type' => 'error'
        );

        return redirect()->to('/')->with($notification);

            }


        }else{

             $notification = array(
            'message' => 'You Need to Login First',
            'type' => 'error'
        );

        return redirect()->route('login')->with($notification);

        }

    } // end method




}
