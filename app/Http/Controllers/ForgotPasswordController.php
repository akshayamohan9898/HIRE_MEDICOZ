<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\LoginData;

class ForgotPasswordController extends Controller
{
    public function showVerificationOptions()
    {
        return view('auth.passwords.forgot_password');
    }

    public function handleVerification(Request $request)
    {
        $request->validate([
            'verification_type' => 'required',
            'email' => 'required_if:verification_type,email|email|nullable',
            'phonenumber' => 'required_if:verification_type,phone|digits:10|nullable',
        ]);

        // Generate OTP
        $otp = rand(100000, 999999); // Generate OTP
        Session::put('otp', $otp);

        if ($request->verification_type === 'email') {
            $user = LoginData::where('email', $request->email)->first();
            if (!$user) {
                return response()->json(['message' => 'This email is not registered.'], 400);
            }
            Session::put('verification_email', $request->email);
        } else {
            $user = LoginData::where('phonenumber', $request->phonenumber)->first();
            if (!$user) {
                return response()->json(['message' => 'This phone number is not registered.'], 400);
            }
            Session::put('verification_phone', $request->phonenumber);
        }

        return response()->json(['otp' => $otp]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        if ($request->otp != Session::get('otp')) {
            return response()->json(['message' => 'Invalid OTP.'], 400);
        }

        return response()->json(['message' => 'OTP verified successfully']);
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
            return back()->withErrors(['error' => 'User not found.']);
        }

        $user->password = bcrypt($request->password);
        $user->save();

        Session::forget(['otp', 'verification_email', 'verification_phone']);

        return redirect()->route('login')->with('message', 'Password reset successful!');
    }
}
