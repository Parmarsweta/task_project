@extends('layouts.app')
@section('content')
<div class="card shadow-lg p-4 mx-auto" style="max-width: 450px;">
  <h3 class="text-center text-primary mb-3">Email Verification</h3>
  <p class="text-center text-muted mb-4">Enter the 6-digit verification code sent to your email.</p>

  <form method="POST" action="{{ route('verify.code') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" value="{{ session('email') }}" class="form-control" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Verification Code</label>
      <input type="text" name="verification_code" class="form-control" placeholder="Enter code" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Verify Now</button>
  </form>
</div>
@endsection
