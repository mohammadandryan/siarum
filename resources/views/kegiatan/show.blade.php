{{-- Import Data --}}
@extends('templates.master')


{{-- Title --}}
@section('title', 'Detail' . $kegiatan->nama)


{{-- Content --}}
@section('content')


    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <a href="{{ route('kegiatans.index') }}" class="mt-3 btn btn-warning"><i
                        class="bi ms-1 bi-arrow-left-circle-fill"> </i> Kembali </a>
            </div>

        </div>

        <div class="row mt-4 ">
            <div class="col ms-1 me-1 mb-1r">
                {{-- @if ($kegiatan->link_gambar)
                    <img style="max-width:200px;" src="{{ asset('storage/'.$kegiatan->link_gambar) }}" class="img-fluid" alt="gambar">
                    @else
                    <img style="max-width:200px;" src="{{ asset('img/talent.jpg') }}" class="img-fluid" alt="gambar">

                    @endif --}}
                <h3 class="border-5 ps-2 border-start border-primary">{{ $kegiatan->nama }}</h3>
                @php
                $status = $kegiatan->status ;
                  if ($status == "Selesai") {
                    $bg = "danger";
                  } elseif ($status == "Coming Soon") {
                    $bg = "warning";
                  } else {
                    $bg = "success";
                  }
              @endphp
              <p id="desc" class="card-text"><span class="badge text-bg-{{ $bg }}">{{ $kegiatan->status }}</span></p>
                <p id="desc" class="mt-3 card-text">{{ $kegiatan->desk }}</p>
                {{-- <p id="desc" class="card-text"><span class="badge text-bg-info">{{$kegiatan->mulai->format('Y-m-d')}} - {{ $kegiatan->selesai->format('Y-m-d')}}</span></p> --}}

                <h3 class="border-5 ps-2 border-start border-primary">Sub Kegiatan</h3>

                <div class="row mt-4 justify-content-start">
                    @if ($kegiatan->subks->count() > 0)
                    @foreach ($kegiatan->subks as $sk)
                    <div class="col-12 col-sm-6 col-md-4 mb-4 justify-content-start">
                        <div class="card" style="margin:auto;max-width: 100%;">
                            <div class="card-body">
                              <h5 class="card-title">{{ $sk->nama }}</h5>
                              @php
                    $status =$sk->status;
                      if ($status == "Selesai") {
                        $bg = "danger";
                      } elseif ($status == "Coming Soon") {
                        $bg = "warning";
                      } else {
                        $bg = "success";
                      }
                  @endphp
                  <p id="desc" class="card-text"><span class="badge text-bg-{{ $bg }}">{{ $sk->status }}</span></p>
                              <a href="{{ url('/subks/'.$sk->id) }}" class="btn btn-primary">Selengkapnya</a>
                              @can('admin')

                              <a href="{{ url('/subks/'.$sk->id.'/edit') }}" class="btn btn-warning"><i class="bi-pencil-square"></i></a>
                              <form action="{{ url('/subks/'.$sk->id) }}"  method="post" class="d-inline form-destroy">
                            @method('delete')
                            @csrf
                            <div class="destroy btn btn-danger"><i class="bi-trash-fill"></i></div>
                            </form>
                              @endcan
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-12 col-sm-6 col-md-4 mb-4 justify-content-center">
                        <div class="card" style="margin:auto;max-width: 100%;">
                            <div class="card-body">
                              <h5 class="card-title">Tidak ada kegiatan</h5>
                              <p id="desc" class="l-100 card-text">Tidak ada kegiatan yang ditampilkan</p>
                              <a href="{{ soute('page.soon') }}" class=" btn btn-primary">Tambah Kegiatan</a>
                            </div>
                        </div>
                    @endif


                </div>
            </div>

        </div>
    </div>

@endsection
