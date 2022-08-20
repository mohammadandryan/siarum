{{-- Import Data --}}

@extends('templates.master')


{{-- Title --}}
@section('title', 'Verifikasi Email')


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
@if (session('warning'))
<script>
    Swal.fire(
  'Sipp!',
  '{{ session("warning") }}',
  'warning'
)
</script>
@endif

<div class="container mt-3">

    <div class="row">
        <div class="col">
            <h3 class="border-5 ps-2 border-start border-primary">Verifikasi Email</h3>
            <p>Silahkan cek email anda dan tekan tombol verifikasi!</p>
            <form action="{{ route('verification.send') }}" method="post">
                <button type="submit" class="btn btn-success">Kirim Ulang</button>
            </form>
            <a href="{{ route('verification.send') }}" class="btn btn-success">Kirim Ulang</a>
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



