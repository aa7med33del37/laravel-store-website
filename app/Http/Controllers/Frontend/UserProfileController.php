<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('frontend.users.index');
        } else {
            return redirect()->back()->with('error', 'Please Login To Continue');
        }
    }

    public function updateUserDetails(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|digits:11',
            'pincode' => 'nullable',
            'city' => 'required|string',
            'address' => 'required|string',
        ]);
        $user = User::findOrFail(Auth::user()->id);
        if ($user) {
            $user->update([
                'name' => $request->name,
            ]);

            if ($user->UserDetail) {
                $user->UserDetail()->update([
                    'phone' => $request->phone,
                    'pincode' => $request->pincode,
                    'city' => $request->city,
                    'address' => $request->address,
                ]);
                return redirect()->back()->with('success_message', 'User Profile Updated');

            } else {
                $user->UserDetail()->create([
                    'user_id' => $user->id,
                    'phone' => $request->phone,
                    'pincode' => $request->pincode,
                    'city' => $request->city,
                    'address' => $request->address,
                ]);
                return redirect()->back()->with('success_message', 'User Profile Updated');
            }
        }
    }

    public function updateUserPassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $current_password_status = Hash::check($request->current_password, Auth::user()->password);
        if ($current_password_status) {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect()->back()->with('success_message', 'Password Updated');

        } else {
            return redirect()->back()->with('error_message', 'Current password does not match with old password');
        }
    }
}
