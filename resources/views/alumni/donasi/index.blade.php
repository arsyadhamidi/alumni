@extends('admin.layout.master')
@section('menuAlumniDonasi', 'active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Donasi</h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-header">
                        List Donasi Anda
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%; text-align:center">No.</th>
                                    <th style="text-align:center">Alumni</th>
                                    <th style="text-align:center">Pengurus</th>
                                    <th style="text-align:center">Nama</th>
                                    <th style="text-align:center">Tanggal</th>
                                    <th style="text-align:center">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donasis as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->alumni->nama ?? '-' }}</td>
                                        <td>{{ $data->pengurus->nama ?? '-' }}</td>
                                        <td>{{ $data->nama ?? '-' }}</td>
                                        <td>{{ $data->tanggal ?? '-' }}</td>
                                        <td>Rp. {{ $data->jumlah_donasi ?? '-' }},-</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-script')
    <script>
        $(document).ready(function() {
            @if (Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        });
    </script>
@endpush
