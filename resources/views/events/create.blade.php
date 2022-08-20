{{-- Import Data --}}
@extends('templates.master')


{{-- Title --}}
@section('title', 'Tambah Kegiatan')


{{-- Content --}}
@section('content')


<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="border-5 ps-2 border-start border-primary">Tambah Kegiatan</h3>

        </div>

    </div>

    <div class="row mt-4 ">
        <div class="col-12 col-md-5 col-lg-3 ms-1 me-1 mb-1r">

            <form action="{{ route('events.store') }}" method="post">
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Kegiatan</label>
                  <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <a href="{{  route('events.index')  }}" class="mt-3 btn btn-warning"><i class="bi ms-1 bi-arrow-left-circle-fill"> </i> Kembali </a>

        </div>

    </div>
</div>

@endsection




{{-- <form action="{{ route('events.store') }}" method="post">
    @csrf
    <input type="text" name="nama" placeholder="Nama">
    <input type="text" name="deskripsi" placeholder="Deskripsi">
    <input type="submit" value="Simpan">
</form>
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

aa --}}
