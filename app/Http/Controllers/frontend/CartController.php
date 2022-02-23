<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;



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
                    'size' => $product->size,
                    'color' => $product->color,
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
                    'size' => $product->size,
                    'color' => $product->color,
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
}
