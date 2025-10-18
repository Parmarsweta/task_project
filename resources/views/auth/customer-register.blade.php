@extends('layouts.app')
@section('content')
<div class="card shadow-lg p-4 mx-auto" style="max-width: 500px;">
  <h3 class="text-center mb-4 text-primary">Customer Registration</h3>

  <form method="POST" action="{{ route('customer.register.submit') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">First Name</label>
      <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror">
      @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Last Name</label>
      <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror">
      @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
      @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
      @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Confirm Password</label>
      <input type="password" name="password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-success w-100">Register as Customer</button>
  </form>
</div>
@endsection
