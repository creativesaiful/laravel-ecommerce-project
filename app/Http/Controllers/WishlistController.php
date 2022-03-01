<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishlist($id){
        if(Auth::check() && Auth::user()){

            $exist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->first();

            if($exist){

                return response()->json(['error'=>'Already in wishlist']);

            }else{
                $wishlist = new Wishlist();
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $id;
                $wishlist->save();
                return response()->json(['success'=>'Added to wishlist']);

            }

        }else{
            return response()->json(['error'=>'You must login first']);
        }
    	$product = Product::find($id);
    	$wishlist = new Wishlist();
    	$wishlist->product_id = $product->id;
    	$wishlist->user_id = Auth::user()->id;
    	$wishlist->save();
    	return redirect()->back();
    }//End of AddToWishlist


    public function WishlistView(){

        if(Auth::check() && Auth::user()){
            $wishlistAll = Wishlist::where('user_id', Auth::user()->id)->latest()->get();
            return view('frontend.product.wishlist_view', compact('wishlistAll'));

        }else{
            return redirect()->route('login');
        }

       // return $wishlistAll;


    }//End of WishlistView


    public function WishlistRemove($id){
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();

        return response()->json(['success'=>'Removed from wishlist']);
    }//End of RemoveFromWishlist
}
