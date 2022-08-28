@extends('templates.master')
@section('title', 'Home')
@section('content')
<div class="container mt-3 ">

    <div class="row justify-content-center">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" >
              <div class="carousel-item active">
                <div class="card mb-3" style="">
                    <div class="row">
                      <div class="col-md-4">
                        <img src="{{ asset('img/inventor.png') }}" class="img-fluid rounded-start" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Semua dalam Genggaman</h5>
                          <p class="card-text">Nikmati semua kemudahan informasi asrama dalam satu genggaman.</p>

                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/inventor.png') }}" class="d-block w-100" alt="..."style="max-height: 200px">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('img/minimart.png') }}" class="d-block w-100" alt="..."style="max-height: 200px">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        <h3 class="border-5 ps-2 border-start border-primary">Kegiatan</h3>
        @if ($events->count() > 0)
        <div class="row justify-content-start">


            @foreach ($events as $event)
            <div class="col-12 col-sm-6 col-md-4 mb-4">
                <div class="card" style="max-width: 100%;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $event->nama }}</h5>
                      <p id="desc" class="l-100 card-text">{{ $event->deskripsi }}</p>
                      {{-- <p id="desc" class="card-text"><span class="badge text-bg-info">{{$event->mulai->format('Y-m-d')}} - {{ $event->selesai->format('Y-m-d')}}</span></p> --}}
                      <p id="desc" class="card-text"><span class="badge text-bg-success">Cooming soon</span></p>
                      <a href="{{ url('/events/'.$event->id) }}" class="btn btn-primary">Selengkapnya</a>
                      @can('admin')

                      <a href="{{ url('/events/'.$event->id.'/edit') }}" class="btn btn-warning"><i class="bi-pencil-square"></i></a>
                      <form action="{{ url('/events/'.$event->id) }}"  method="post" class="d-inline form-destroy">
                    @method('delete')
                    @csrf
                    <div class="destroy btn btn-danger"><i class="bi-trash-fill"></i></div>
                    </form>
                      @endcan
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="col-12 col-sm-6 col-md-4 mb-4 justify-content-center">
            <div class="card" style="margin:auto;max-width: 100%;">
                <div class="card-body">
                  <h5 class="card-title">Tidak ada kegiatan</h5>
                  <p id="desc" class="l-100 card-text">Tidak ada kegiatan yang ditampilkan</p>
                  <a href="{{ url('/events/create') }}" class=" btn btn-primary">Tambah Kegiatan</a>
                </div>
            </div>
        @endif
        <h3 class="border-5 ps-2 border-start border-primary">Home</h3>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Special title treatment</h5>
                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
          </div>

    </div>

</div>
@endsection
