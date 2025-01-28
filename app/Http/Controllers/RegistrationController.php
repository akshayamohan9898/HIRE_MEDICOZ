<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoginData;
use App\Models\PersonalDetails;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;


class RegistrationController extends Controller
{
    
    public function RegisterIndex()
    {
        return view('register');
    }

  
    public function datasubmit(Request $request)
    {  
      

        $validated = $request->validate([
            'user_email' => 'required|email',
            'phonenumber' => 'required|digits:10',
            'user_password' => [
                'required',
                Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised(),
            ],
            'name' => 'required',
        ], [
            'user_email.unique' => 'This email is already registered. Please use a different one.',
            'phonenumber.unique' => 'This phone number is already in use. Please enter another number.',
            'user_password.regex' => 'Password must be at least 8 characters long, contain at least one uppercase letter, and one special character (!@#$%^&*).',
        ]);
        
        
        
   
        $loginData = LoginData::create([
            'email' => $validated['user_email'],
            'password' => bcrypt($validated['user_password']),
            'user_type' => $request->input('user_type', 'default_user_type'),
            'phone_otp' => rand(100000, 999999),
            'email_otp' => rand(100000, 999999),
            'login_status' => 'pending',
        ]);
    
        PersonalDetails::create([
            'uid' => $loginData->id,
            'name' => $validated['name'],
            'phonenumber' => $validated['phonenumber'],
            'field_of_profession' => $request->input('field', ''),
        ]);
        session(['uid' => $loginData->id]);
        
        Session::put('phone_otp', $loginData->phone_otp);
        Session::put('email_otp', $loginData->email_otp);
        Session::put('loginDataId', $loginData->id);
    
        return redirect()->route('otp.verification');
    }
    
   
    
    public function verifyOtpPage()
    {
        return view('otp_verification');
    }

   
    public function verifyOtp(Request $request)
    {
        $phoneOtpInput = $request->input('phoneotp');
        $emailOtpInput = $request->input('emailotp');

        
        $storedPhoneOtp = Session::get('phone_otp');
        $storedEmailOtp = Session::get('email_otp');
        $loginDataId = Session::get('loginDataId'); 

       
        if ($phoneOtpInput == $storedPhoneOtp && $emailOtpInput == $storedEmailOtp) {
            
            $user = LoginData::find($loginDataId);
            
            if ($user) {
                $user->update(['login_status' => 'verified']);
            }

            
            return redirect()->route('candidate.dashboard')->with('message', 'Registration successful!');
        } else {
            
            return back()->with('error', 'Incorrect OTP, please try again.');
        }
    }
}