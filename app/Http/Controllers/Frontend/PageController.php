<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use App\Models\VendorStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }


    public function vendor_store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:vendors',
            'phone'=>'required|digits:10',
            'address'=>'required',
            'vendor_name'=>'required',
        ]);

        $vendor = new Vendor();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->password = Hash::make("password");
        $vendor->save();

        $vendor_store = new VendorStore();
        $vendor_store->name = $request->vendor_name;
        $vendor_store->address = $request->address;
        $vendor_store->phone = $request->phone;
        $vendor_store->vendor_id = $vendor->id;
        $vendor_store->save();


        toast('Your Request has been successfully submited!','success');

        return redirect()->back();
    }
}
