<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Support\Str;

class adminProfileController extends Controller
{
    // admin profile
    public function view()
    {
        $details = Auth::user();
        return view('admin.profile',compact('details'));
    }

    // user profile
    public function viewUserProfile()
    {
        $details = Auth::user();
        return view('user.profile',compact('details'));
    }

    public function passwordReset(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'new_password' => 'required',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('success', 'password-updated');
    }

    public function profileUpdate(Request $request)
{

    $request->validate([
        'pro_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'bio' => 'nullable|string',
    ]);

    $auth = Auth::user()->id;
    $user = User::findOrFail($auth);

    $user->bio = $request->bio;

    if ($request->hasFile('pro_image')) {
        // Delete the old image if it exists in the public/pro_pic folder
        if ($user->pro_image && File::exists(public_path('pro_pic/' . $user->pro_image))) {
            File::delete(public_path('pro_pic/' . $user->pro_image));
        }

        $image = $request->file('pro_image');

        // Generate a unique name using UUID
        $uniqueId = Str::uuid();
        $imageExtension = $image->getClientOriginalExtension();
        $imageName = $uniqueId . '.' . $imageExtension;

        $image->move(public_path('pro_pic'), $imageName);

        $user->pro_image = $imageName;
    }

    $user->save();

    return back()->with('success', 'Profile updated successfully');
}


}
