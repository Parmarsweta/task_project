<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function showVerifyPage()
    {
        return view('auth.verify');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'verification_code' => 'required|numeric'
        ]);

        $user = User::where('email', $request->email)
                    ->where('verification_code', $request->verification_code)
                    ->first();

        if ($user) {
            $user->is_verified = true;
            $user->verification_code = null;
            $user->save();

            return redirect()->back()->with('success', 'Your email has been verified successfully!');
        } else {
            return redirect()->back()->with('error', 'Invalid verification code.');
        }
    }
}

