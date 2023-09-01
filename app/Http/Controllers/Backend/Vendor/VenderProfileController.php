<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class VenderProfileController extends Controller
{
    public function vendorProfile() {
        return view('vendor.dashboard.profile');
    }

    // Vendor profile update
    public function vendorProfileUpdate(Request $request) {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id],
            'image' => ['image', 'max:2000']
        ]);

        $vendor = Auth::user();

        if ($request->hasFile('image')) {
            if (File::exists(public_path($vendor->image))) {
                File::delete(public_path($vendor->image));
            }

            $image = $request->image;
            $imageName = rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = "/uploads/".$imageName;
            $vendor->image = $path;
        }

        $vendor->name = $request->name;
        $vendor->email = $request->email;

        $vendor->save();

        toastr('Vendor Profile Updated Successfully!!!');
        return redirect()->back();
    }
}
