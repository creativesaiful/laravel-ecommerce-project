<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

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

        return response()->json(['cart'=>$cart,'cart_count'=>$cart_count,'cart_total'=>$cart_total]);
    }//end of CartPageData


    public function RemoveCartItemFromCartPage($rowId){

        Cart::remove($rowId);
        return response()->json('deleted');
    }//end of RemoveCartItemFromCartPage


    public function CartIncrement($rowId){

       $row =  Cart::get($rowId);

        Cart::update($rowId, $row->qty+1);
        return response()->json('incremented');
    }//end of Cart Increment

    public function CartDecrement($rowId){

        $row =  Cart::get($rowId);

        if($row->qty>1){
            Cart::update($rowId, $row->qty-1);
            return response()->json('decremented');

        }else{
            return response()->json(['error'=>'Minimum quantity is 1']);
        }
    }//end of Cart Decrement


}
