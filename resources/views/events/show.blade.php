{{-- Import Data --}}
@extends('templates.master')


{{-- Title --}}
@section('title', 'Detail'.$event->nama)


{{-- Content --}}
@section('content')


<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="border-5 ps-2 border-start border-primary">{{ $event->nama }}</h3>

        </div>

    </div>

    <div class="row mt-4 ">
        <div class="col ms-1 me-1 mb-1r">
                @if ($event->link_gambar)
                <img style="max-width:200px;" src="{{ asset('storage/'.$event->link_gambar) }}" class="img-fluid" alt="gambar">
                @else
                <img style="max-width:200px;" src="{{ asset('img/talent.jpg') }}" class="img-fluid" alt="gambar">

                @endif

                  <p id="desc" class="mt-3 card-text">{{ $event->deskripsi }}</p>
                  {{-- <p id="desc" class="card-text"><span class="badge text-bg-info">{{$event->mulai->format('Y-m-d')}} - {{ $event->selesai->format('Y-m-d')}}</span></p> --}}
                  <p id="desc" class="card-text"><span class="badge text-bg-success">Cooming soon</span></p>
                  <a href="{{  route('events.index')  }}" class="mt-3 btn btn-warning"><i class="bi ms-1 bi-arrow-left-circle-fill"> </i> Kembali </a>
        </div>
    </div>
</div>

@endsection



