@extends('templates.master')
@section('title', 'Dashboard')
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
@if (session('warning'))
<script>
    Swal.fire(
  'Sipp!',
  '{{ session("warning") }}',
  'warning'
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

<div class="container mt-3">

    <div class="row">
        <div class="col">
            <h3 class="border-5 ps-2 border-start border-primary">Dashboard </h3>
        </div>
    </div>
    <div class="row mt-4 justify-content-center">

        <div class="col-12 col-sm-6 col-md-3 mb-4 justify-content-center">
                <a href="{{ route('events.index') }}" class="tnone text-dark">
                <div class="card" style="margin:auto;max-width: 100%;">
                    <img src="{{ asset('img/warga.png') }}" class="card-img-top" alt="Event">
                    <div class="card-body text-center">
                      <h5 class="card-title">Daftar Warga</h5>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-12 col-sm-6 col-md-3 mb-4 justify-content-center">
                <a href="{{ route('events.index') }}" class="tnone text-dark">
                <div class="card" style="margin:auto;max-width: 100%;">
                    <img src="{{ asset('img/events.png') }}" class="card-img-top" alt="Event">
                    <div class="card-body text-center">
                      <h5 class="card-title">Kegiatan</h5>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-12 col-sm-6 col-md-3 mb-4 justify-content-center">
                <a href="{{ route('events.index') }}" class="tnone text-dark">
                <div class="card" style="margin:auto;max-width: 100%;">
                    <img src="{{ asset('img/minimart.png') }}" class="card-img-top" alt="Event">
                    <div class="card-body text-center">
                      <h5 class="card-title">Minimart</h5>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-12 col-sm-6 col-md-3 mb-4 justify-content-center">
                <a href="{{ route('events.index') }}" class="tnone text-dark">
                <div class="card" style="margin:auto;max-width: 100%;">
                    <img src="{{ asset('img/inventor.png') }}" class="card-img-top" alt="Event">
                    <div class="card-body text-center">
                      <h5 class="card-title">Pengelolaan Inventaris</h5>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-12 col-sm-6 col-md-3 mb-4 justify-content-center">
                <a href="{{ route('events.index') }}" class="tnone text-dark">
                <div class="card" style="margin:auto;max-width: 100%;">
                    <img src="{{ asset('img/book.png') }}" class="card-img-top" alt="Event">
                    <div class="card-body text-center">
                      <h5 class="card-title">Buku Pelanggaran</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-12 col-sm-6 col-md-3 mb-4 justify-content-center">
                <a href="{{ route('events.index') }}" class="tnone text-dark">
                <div class="card" style="margin:auto;max-width: 100%;">
                    <img src="{{ asset('img/prta.png') }}" class="card-img-top" alt="Event">
                    <div class="card-body text-center">
                      <h5 class="card-title">Manajemen PRTA</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
