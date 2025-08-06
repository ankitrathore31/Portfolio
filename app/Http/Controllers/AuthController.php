<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registerPage()
    {

        return view('auth.register');
    }

    public function loginPage()
    {

        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect()->route('login.page')->with('Success', 'Registration Successfully');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if ($user && Hash::check($validated['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    
    public function ForgotPass(){
        return view('auth.forgot-password');
    }

    public function sendOtp(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return back()->withErrors(['email' => 'Email not found. ']);
        }

        $otp = rand(100000, 999999);
        Session::put('otp', $otp);
        Session::put('otp_email', $request->email);

        Mail::raw("Your Password reset otp is: $otp ", function($message) use ($request){
            $message->to($request->email)
                    ->subject('Your OTP for Password Reset');
        });

        return redirect()->route('password.reset.page')->with('success', 'Otp sent your email. ');
    }

    public function ResetPassPage(){

        return view('auth.reset-password-otp');

    }
    public function ResetPassWithOtp(Request $request){

        $request->validate([
            'otp' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if($request->otp != session::get('otp')){
            return back()->withErrors(['otp' => 'Invalid Otp']);
        }

        $user = User::where('email', Session::get('otp_email'))->first();

        if(!$user){
            return back()->withErrors(['email' => 'Email not found']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        Session::forget('otp');
        Session::forget('otp_email');

        return redirect()->route('login.page')->with('sucess', 'Password reset succcessfully. ');

    }
}
