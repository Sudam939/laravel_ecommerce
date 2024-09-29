<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use App\Models\Vendor;
use App\Models\VendorStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    public function home()
    {
        $carousels = Carousel::where('status', 1)->get();
        $vendors = Vendor::where('status', 'approved')->get();
        return view('frontend.home', compact('carousels','vendors'));
    }

    public function vendor($id)
    {
        $vendor = Vendor::find($id);
        $vendor_store = VendorStore::where('vendor_id', $vendor->id)->first();
        return view('frontend.vendor', compact('vendor','vendor_store'));
    }


    public function vendor_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:vendors',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'vendor_name' => 'required',
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


        toast('Your Request has been successfully submited!', 'success');

        return redirect()->back();
    }
}
