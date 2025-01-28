<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\LoginData;

class LoginController extends Controller
{
    public function LoginIndex()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required|min:8',
        ], [
            'user_email.required' => 'Email is required.',
            'user_password.required' => 'Password is required.',
        ]);
    
        $user = LoginData::where('email', $request->user_email)->first();
    
        if (!$user || !Hash::check($request->user_password, $user->password)) {
            return back()->with('error', 'Invalid email or password.');
        }
    
        if ($user->login_status !== 'verified') {
            return back()->with('error', 'Your account has not been verified yet.');
        }
    
        session(['uid' => $user->id, 'email' => $user->email]);
    
        return redirect()->route('candidate.dashboard')->with('message', 'Login successful!');
    }
    

}
