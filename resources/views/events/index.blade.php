{{-- Import Data --}}

@extends('templates.master')


{{-- Title --}}
@section('title', 'Daftar Kegiatan')


{{-- Content --}}
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

<div class="container mt-3">

    <div class="row">
        <div class="col">
            <h3 class="border-5 ps-2 border-start border-primary">Daftar Kegiatan</h3>
            <a href="{{  route('events.create')  }}" class="mt-3 btn btn-primary">Tambah Kegiatan <i class="bi ms-1 bi-plus-circle"></i></a>

        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('events.index') }}" class="mt-3">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari" name="cari" value="{{ request()->cari }}">
                    <button class="btn btn-danger" type="submit" ><b><i class="bi-search"></i></b></button>
                  </div>
            </form>

        </div>
    </div>




    <div class="row mt-4 justify-content-center">
        @if ($events->count() > 0)
        @foreach ($events as $event)
        <div class="col-12 col-sm-6 col-md-4 mb-4 justify-content-center">
            <div class="card" style="margin:auto;max-width: 100%;">
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
        <div class="d-flex justify-content-end">
            {{ $events->links() }}
        </div>

    </div>
</div>

<script>
    $('.destroy').click(function () {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.value) {
                $(this).closest('form').submit();
            }
        })
    });
</script>
@endsection



