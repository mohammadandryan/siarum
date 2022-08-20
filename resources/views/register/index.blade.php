@extends('templates.master')
@section('title', 'Register')
@section('content')    
<main class="form-signin w-100 m-auto">
    <form action="{{ route('register.store') }}" method="POST">
        @csrf

      <h1 class="h3 mb-3 text-center fw-normal">Daftar</h1>
  
      <div class="form-floating">
        <input type="email" class="rounded-top form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com"  name="email" value="{{ old('email') }}">
        <label for="floatingInput">Email address</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-floating">
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" placeholder="name@example.com" name="nama" value="{{ old('nama') }}">
        <label for="nama"  >Nama</label>
        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" >
        <label for="password" >Password</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="rounded-bottom form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Konfirmasi Password" name="password_confirmation" >
        <label for="password_confirmation" >Konfirmasi Password</label>
        @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
  
      <button class="w-100 btn btn-lg mt-3 btn-primary" type="submit">Daftar</button>
    </form>
      <small class="d-block text-center">Sudah punya akun? <a href="{{ route('login.index') }}">Login</a>
      </small>
    
</main>
@endsection
