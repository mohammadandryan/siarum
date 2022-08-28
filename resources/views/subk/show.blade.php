{{-- Logic --}}

{{-- Import Data --}}
@extends('templates.master')


{{-- Title --}}
@section('title', 'Detail' . $subk->nama)


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
                {{-- @if ($subk->link_gambar)
                <img style="max-width:200px;" src="{{ asset('storage/'.$subk->link_gambar) }}" class="img-fluid" alt="gambar">
                @else
                <img style="max-width:200px;" src="{{ asset('img/talent.jpg') }}" class="img-fluid" alt="gambar">

                @endif --}}

                <h3 class="border-5 ps-2 border-start border-primary">{{ $subk->nama }}</h3>
                @php
                    $status =$subk->status ;
                      if ($status == "Selesai") {
                        $bg = "danger";
                      } elseif ($status == "Coming Soon") {
                        $bg = "warning";
                      } else {
                        $bg = "success";
                      }
                  @endphp
                  <p id="desc" class="card-text"><span class="badge text-bg-{{ $bg }}">{{ $subk->status }}</span></p>
                <a href="{{ url('/presensi/' . $subk->id) }}" class="mt-3 btn btn-success"><i class="bi ms-1 bi-plus-circle">
                    </i> Tambah Presensi
                </a>
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="border-5 ps-2 border-start border-primary mt-5">Daftar Hadir</h3>
                    </div>
                </div>

                <div class="row justify-content-start mt-3">
                    <div class="col">
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
                                        @php
                                            $counts = $subk->presensi->where('nim', '=', $warga->nim);
                                            if ($counts->count() < 1) {
                                                $status = 'Tidak Hadir';
                                            } else {
                                                $status = 'Hadir';
                                            }
                                            if ($status == 'Hadir') {
                                                $bg = 'success';
                                            } else {
                                                $bg = 'danger';
                                            }
                                        @endphp
                                        <td><span class="badge text-bg-{{ $bg }}">{{ $status }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <p id="desc" class="card-text"><span class="badge text-bg-info">{{$subk->mulai->format('Y-m-d')}} - {{ $subk->selesai->format('Y-m-d')}}</span></p> --}}
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
