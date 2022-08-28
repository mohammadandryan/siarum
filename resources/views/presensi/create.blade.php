{{-- Import Data --}}
@extends('templates.master')


{{-- Title --}}
@section('title', 'Tambah Presensi')


{{-- Content --}}
@section('content')
@php
    $success = "home";
@endphp

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasi!</strong> Warga berhasil absen!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif


                <a href="{{ URL::previous() }}" class="mt-3 mb-3 btn btn-warning"><i class="bi ms-1 bi-arrow-left-circle-fill">
                    </i> Kembali </a>
                <h3 class="border-5 ps-2 border-start border-primary">Tambah Presensi {{ $subk->nama }}</h3>

            </div>

        </div>

        <div class="row mt-4 justify-content-center ">

            <input type="hidden" name="result" id="result">
            <div class="col-md-8" style="" id="reader"></div>

        </div>
    </div>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // $('#result').val('test');
        function onScanSuccess(decodedText, decodedResult) {
            // alert(decodedText);
            $('#result').val(decodedText);
            let subk = "{{ $subk->id }}";
            let home = "http://127.0.0.1:8000";

            window.location.replace(home + "/presensi/" + subk + "/" + decodedText);
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
