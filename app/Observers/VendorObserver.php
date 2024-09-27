<?php

namespace App\Observers;

use App\Mail\EmailNotification;
use App\Models\Vendor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class VendorObserver
{
    /**
     * Handle the Vendor "created" event.
     */
    public function created(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "updated" event.
     */
    public function updated(Vendor $vendor): void
    {
        if ($vendor->isDirty('status') && $vendor->status == 'approved') {
            $password = "password";

            $vendor->withoutEvents(function () use ($vendor, $password) {
                $vendor->password = Hash::make($password);
                $vendor->update();
            });

            $data = [
                "name" => $vendor->name,
                "subject" => "Vendor Registration Approved",
                "message" => "Your Vendor Registration has been approved.\nYour Login Credentials are\nEmail: $vendor->email\nPassword: $password",
            ];

            Mail::to($vendor->email)->send(new EmailNotification($data));
        }
    }

    /**
     * Handle the Vendor "deleted" event.
     */
    public function deleted(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "restored" event.
     */
    public function restored(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "force deleted" event.
     */
    public function forceDeleted(Vendor $vendor): void
    {
        //
    }
}
