<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Zerkxubas\EsewaLaravel\Facades\Esewa;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        $request->validate([
            'address' => 'required',
        ]);
        Cookie::queue(Cookie::make('address', $request->address));

        $paymentID = uniqid();

        $user = Auth::guard('web')->user();
        $carts = Cart::where('user_id', $user->id)->get();
        $totalAmount = 0;
        foreach ($carts as $cart) {
            $totalAmount += $cart->price;
        }

        return Esewa::checkout($paymentID, $totalAmount, 13, 2, 100);
    }


    public function verify_payment()
    {
        $paymentID = $_GET['oid'];
        $transactionAmount = $_GET['amt'];
        $refrenceID = $_GET['refId'];

        $paymentStatus = Esewa::verifyPayment($refrenceID, $paymentID, $transactionAmount);

        if ($paymentStatus) {
            return redirect()->route('store_order');
        } else {
            toast('Order Placed successfully!', 'error');
            return redirect()->route('checkout');
        }
    }
}
