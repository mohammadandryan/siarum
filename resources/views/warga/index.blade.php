{{-- Logic --}}
@php
$status = "Tidak hadir";
    if($status == "Hadir"){
        $bg = "success";
    } else {
        $bg = "danger";
    }
@endphp
{{-- Import Data --}}
@extends('templates.master')


{{-- Title --}}
@section('title', 'Daftar Warga')


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
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="border-5 ps-2 border-start border-primary mt-5">Daftar Warga</h3>
                    </div>
                </div>

                <div class="row justify-content-center mt-3">
                    <div class="col-12">
                        <table id="presensi" class="mt-3 table table-bordered display nowrap" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <td>Nama</td>
                                    <td>Nim</td>
                                    <td>Asrama</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wargas as $warga)
                                <tr>
                                    <td>{{ $warga->nama }}</td>
                                    <td>{{ $warga->nim }}</td>
                                    <td>{{ $warga->asrama }}</td>
                                    <td><span class="badge text-bg-{{ $bg }}">{{ $status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#presensi').DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.childRowImmediate,
                        type: 'none',
                        target: ''
                    }
                }
            });
        });
    </script>
@endsection
