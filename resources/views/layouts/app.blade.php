<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ config('app.name', 'Role Auth System') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  {{-- Bootstrap CSS --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  {{-- SweetAlert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-light">

  {{-- ✅ Navbar --}}
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold" href="#">Role Auth System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @guest
            <li class="nav-item"><a href="{{ route('customer.register') }}" class="nav-link">Customer Register</a></li>
            <li class="nav-item"><a href="{{ route('admin.register') }}" class="nav-link">Admin Register</a></li>
            <li class="nav-item"><a href="{{ route('admin.login') }}" class="nav-link">Admin Login</a></li>
          @else
            <li class="nav-item">
              <a href="#" class="nav-link" onclick="logoutConfirm()">Logout ({{ Auth::user()->first_name }})</a>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  {{-- Page Content --}}
  <div class="container mt-5">
    @yield('content')
  </div>

  {{-- SweetAlert Messages --}}
  <script>
    @if(session('success'))
      Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: '{{ session('success') }}',
        timer: 2500,
        showConfirmButton: false
      });
    @endif

    @if(session('error'))
      Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: '{{ session('error') }}',
        timer: 3000,
        showConfirmButton: false
      });
    @endif

    // ✅ Logout confirmation
    function logoutConfirm() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You want to logout!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Logout'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('logout-form').submit();
        }
      });
    }
  </script>

  {{-- Hidden logout form --}}
  <form id="logout-form" method="POST" action="{{ route('admin.logout') }}" style="display:none;">
    @csrf
  </form>

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
