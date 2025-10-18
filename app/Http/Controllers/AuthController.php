<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmailCode;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    // ✅ Customer Registration Form
    public function showCustomerForm()
    {
        return view('auth.customer-register');
    }

    // ✅ Register Customer
    public function registerCustomer(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6|confirmed',
        ]);

        $verificationCode = rand(100000, 999999);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 'customer',
            'verification_code' => $verificationCode,
        ]);

        try {
            // Send email using Mailable
            Mail::to($user->email)->send(new VerifyEmailCode($user));

            Log::info('Verification email sent to: ' . $user->email);
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
            return back()->with('error', 'Verification code could not be sent. Please try again later.');
        }

        return redirect()->route('verify.page')->with('email', $user->email);
    }

    // ✅ Admin Registration Form
    public function showAdminForm()
    {
        return view('auth.admin-register');
    }

    // ✅ Register Admin
    public function registerAdmin(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6|confirmed',
        ]);

        $verificationCode = rand(100000, 999999);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 'admin',
            'verification_code' => $verificationCode,
        ]);

        try {
            Mail::to($user->email)->send(new VerifyEmailCode($user));
            Log::info('Verification email sent to: ' . $user->email);
        } catch (\Exception $e) {
            Log::error('Mail sending failed: ' . $e->getMessage());
            return back()->with('error', 'Verification code could not be sent. Please try again later.');
        }

        return redirect()->route('verify.page')->with('email', $user->email);
    }
}
