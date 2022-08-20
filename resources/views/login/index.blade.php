@extends('templates.master')
@section('title', 'Login')
@section('content')
@if (session('success'))
<script>
    Swal.fire(
  'Sipp!',
  '{{ session("success") }}',
  'success'
)
</script>
@endif

@if (session('LoginError'))
<script>
    Swal.fire(
  'Ups!',
  '{{ session("LoginError") }}',
  'error'
)
</script>
@endif

<main class="form-signin w-100 m-auto">
    <form action="{{ route('login.auth') }}" method="post">
        @csrf
      <h1 class="h3 mb-3 text-center fw-normal">Silahkan masuk</h1>

      <div class="form-floating">
        <input type="email" class="@error('email') is-invalid @enderror rounded-top form-control" id="floatingInput" placeholder="name@example.com" name="email" autofocus required value="{{ old('email') }}">
        <label for="floatingInput">Email address</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="rounded-bottom form-control" id="floatingPassword" placeholder="Password" name="password" required>
        <label for="floatingPassword">Password</label>
      </div>

      <button class="w-100 btn mt-3  btn-lg btn-primary" type="submit">Masuk</button>
      <small class="d-block text-center">Belum punya akun? <a href="{{ route('register.index') }}">Daftar Sekarang</a>
      </small>
    </form>
  </main>
@endsection
