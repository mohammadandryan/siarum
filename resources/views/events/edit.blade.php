{{-- Import Data --}}
@extends('templates.master')


{{-- Title --}}
@section('title', 'Tambah Kegiatan')


{{-- Content --}}
@section('content')


<div class="container mt-3">
    <div class="row">
        <div class="col">
            <h3 class="border-5 ps-2 border-start border-primary">Edit Kegiatan</h3>

        </div>

    </div>

    <div class="row mt-4 ">
        <div class="col-12 col-md-5 col-lg-3 ms-1 me-1 mb-1r">

            <form action="{{ url('/events/'.$event->id) }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama Kegiatan</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama',$event->nama) }}">
                  @error('nama')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
                </div>
                <div class="mb-3">
                  <label for="deskripsi" class="form-label">Deskripsi Kegiatan</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi',$event->deskripsi) }}</textarea>
                    @error('deskripsi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="link_gambar" class="form-label">Upload Gambar</label>
                    <input type="hidden" name="oldImage" value="{{ $event->link_gambar }}">
                    @if ($event->link_gambar)
                        <img src="{{ asset('storage/'.$event->link_gambar) }}"  class="mb-2 d-block img-preview img-fluid">

                    @else
                    <img  class="mb-2 img-preview img-fluid">
                    @endif
                    <input class="form-control @error('link_gambar') is-invalid @enderror" type="file" id="link_gambar" name="link_gambar" onchange="previewImage()">
                    @error('link_gambar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
              <a href="{{  route('events.index')  }}" class="mt-3 btn btn-warning"><i class="bi ms-1 bi-arrow-left-circle-fill"> </i> Kembali </a>

        </div>

    </div>
</div>
<script>
    function previewImage() {


        const image = document.querySelector('#link_gambar');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection




