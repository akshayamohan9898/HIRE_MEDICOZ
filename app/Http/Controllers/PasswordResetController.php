<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\LoginData;

class PasswordResetController extends Controller
{
   
    public function showForgotPasswordForm()
    {
        return view('auth.passwords.forgot_password');
    }

    
    public function handleVerificationOption(Request $request)
    {
        $request->validate([
            'verification_type' => 'required',
            'email' => 'required_if:verification_type,email|email|nullable',
            'phonenumber' => 'required_if:verification_type,phone|digits:10|nullable',
        ]);

       
        $otp = rand(100000, 999999);
        Session::put('otp', $otp);

        if ($request->verification_type === 'email') {
            $user = LoginData::where('email', $request->email)->first();
            if (!$user) {
                return back()->with('error', 'Email not found in the system.');
            }
            Session::put('verification_email', $request->email);
        } else {
            $user = LoginData::where('phonenumber', $request->phonenumber)->first();
            if (!$user) {
                return back()->with('error', 'Phone number not found in the system.');
            }
            Session::put('verification_phone', $request->phonenumber);
        }

        return back()->with('otp_generated', "Your OTP is: $otp");
    }

   
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        if ($request->otp != Session::get('otp')) {
            return back()->with('error', 'Invalid OTP.');
        }

        return redirect()->route('password.reset.form');
    }

   
    public function showResetPasswordForm()
    {
        return view('auth.passwords.reset_password');
    }

   
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $email = Session::get('verification_email');
        $phone = Session::get('verification_phone');

        $user = null;

        if ($email) {
            $user = LoginData::where('email', $email)->first();
        } elseif ($phone) {
            $user = LoginData::where('phonenumber', $phone)->first();
        }

        if (!$user) {
            return back()->with('error', 'No user found for this verification.');
        }

       
        $user->password = Hash::make($request->password); 
        $user->save();

     
        Session::forget(['otp', 'verification_email', 'verification_phone']);

        return redirect()->route('login')->with('message', 'Password reset successful!');
    }
}
