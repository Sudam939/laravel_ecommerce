<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\EmailNotification;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDescription;
use App\Models\Product;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function carts()
    {
        $carts = Cart::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('user.carts', compact('carts'));
    }

    public function checkout()
    {
        return view('user.checkout');
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



    public function store_address(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'phone' => 'required',
            'address_note' => 'required',
        ]);

        $address = new ShippingAddress();
        $address->title = $request->title;
        $address->phone = $request->phone;
        $address->address_note = $request->address_note;
        $address->user_id = Auth::guard('web')->user()->id;
        $address->save();

        toast('Shipping Address added successfully!', 'success');

        return redirect()->back();
    }



    public function store_order(Request $request)
    {
        $request->validate([
            'address' => 'required',
        ]);

        $user = Auth::guard('web')->user();

        $carts = Cart::where('user_id', $user->id)->get();
        $vendors = [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart->price;
            $vendor = $cart->product->vendor;
            if (!in_array($vendor, $vendors)) {
                $vendors[] = $vendor;
            }
        }

        foreach ($vendors as $vendor) {
            $order = new Order();
            $order->vendor_id = $vendor->id;
            $order->shipping_address_id = $request->address;
            $order->total_amt = $total;
            $order->save();

            foreach ($carts as $cart) {
                if ($cart->product->vendor->id == $vendor->id) {
                    $order_description = new OrderDescription();
                    $order_description->order_id = $order->id;
                    $order_description->product_id = $cart->product_id;
                    $order_description->qty = $cart->qty;
                    $order_description->price = $cart->price;
                    $order_description->save();
                }

                $cart->delete();
            }

            $data = [
                "name" => $vendor->name,
                "subject" => "New Order Placed",
                "message" => "$user->name, has placed order. Please check order details in your panel.",
            ];

            Mail::to($vendor->email)->send(new EmailNotification($data));
        }

        toast('Order Placed successfully!', 'success');

        return redirect()->back();
    }
}
