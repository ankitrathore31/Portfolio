<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function Profile(){
        $user = Auth::user();
        return view('Admin.profile.profile', compact('user'));
    }

    public function EditProfile(){
        $user = Auth::user();
        return view('Admin.profile.edit-profile', compact('user'));
    }

    public function UpdateProfile(Request $request){
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile Updated');
    }

    public function ChangePassword(){

        return view('Admin.profile.change-password');
    }

    public function UpdatePass(Request $request){
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed'
        ]);

        $user = Auth::user();

        if(!Hash::check($request->old_password, $user->password)){
            return back()->withErrors(['old_password' => 'The old password is incorrect. ']);
        }

        $user->password = Hash::make($request->new_password);
        return back()->with('success', 'Password changed successfully. ');
    }

}
