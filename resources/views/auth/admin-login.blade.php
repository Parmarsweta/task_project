@extends('layouts.app')
@section('content')
<div class="card shadow-lg p-4 mx-auto" style="max-width: 450px;">
  <h3 class="text-center text-danger mb-4">Admin Login</h3>

  <form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
      @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
      @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-danger w-100">Login</button>
  </form>
</div>
@endsection
