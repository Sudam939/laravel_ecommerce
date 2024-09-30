<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function carts()
    {
        $carts = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('user.carts', compact('carts'));
    }

    public function delete_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        toast(' Cart deleted successfully!', 'success');
        return redirect()->back();
    }

    public function store_cart(Request $request)
    {
        $request->validate([
            'qty' => 'required|numeric|min:1|max:10'
        ]);
        $product = Product::find($request->product_id);

        $my_cart = Cart::where('user_id', Auth::guard('web')->user()->id)
            ->where('product_id', $request->product_id)
            ->first();
        if ($my_cart) {
            $my_cart->qty = $my_cart->qty + $request->qty;
            $my_cart->price = $my_cart->qty * $product->price;
            $my_cart->update();
        } else {
            $cart = new Cart();
            $cart->qty = $request->qty;
            $cart->product_id = $request->product_id;
            $cart->user_id = Auth::guard('web')->user()->id;
            $cart->price = $request->qty * $product->price;
            $cart->save();
        }

        toast(' Cart added successfully!', 'success');

        return redirect()->back();
    }
}
