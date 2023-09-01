<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class UserProfileController extends Controller
{
    public function profile(){
        return view ('frontend.dashboard.profile');
    }

    // user profile update method;
    public function profileUpdate(Request $request) {
    $request->validate([
        'name' => ['required', 'max:100'],
        'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id],
        'image' => ['image', 'max:2000'],
    ]);

    $user = Auth::user();

    if ($request->hasFile('image')) {
        if (File::exists(public_path($user->image))) {
            File::delete(public_path($user->image));
        }

        $image = $request->image;
        $imageName = rand().'_'.$image->getClientOriginalName();
        $image->move(('uploads'), $imageName);

        $path = "/uploads/".$imageName;

        $user->image = $path;
    }

    $user->name = $request->name;
    $user->email = $request->email;

    $user->save();

    toastr('Profile Updated Successfully');
    return redirect()->back();
    }

    // Password Update
    public function profileUpdatePassword(Request $request) {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr('Password Updated Successfully!');
        return redirect()->back();
    }
}
