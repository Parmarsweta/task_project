@extends('layouts.app')
@section('content')
<div class="text-center mt-5">
  <h2 class="text-success">Welcome, {{ Auth::user()->first_name }}!</h2>
  <p>You are logged in as an <strong>{{ Auth::user()->role }}</strong>.</p>
  <p class="text-muted">Enjoy your admin dashboard features here.</p>

  <a href="#" onclick="logoutConfirm()" class="btn btn-outline-danger mt-3">Logout</a>
</div>
@endsection
