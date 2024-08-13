@extends('admin.layout.master')
@section('menuDataKegiatan', 'active')
@section('menuDataDonasi', 'active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Donasi</h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <form action="{{ route('data-donasi.update', $donasis->id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('data-donasi.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                Simpan Data
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg">
                                    <div class="mb-3">
                                        <label>Pilih Pengurus</label>
                                        <select name="pengurus_id" class="form-control @error('pengurus_id') is-invalid @enderror"
                                            id="selectedPengurus">
                                            <option value="" selected>Pilih Pengurus</option>
                                            @foreach ($pengurus as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $donasis->pengurus_id == $data->id ? 'selected' : '' }}>
                                                    {{ $data->nama ?? '-' }}</option>
                                            @endforeach
                                        </select>
                                        @error('pengurus_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Pilih Alumni</label>
                                        <select name="alumni_id" class="form-control @error('alumni_id') is-invalid @enderror"
                                            id="selectedAlumni">
                                            <option value="" selected>Pilih Alumni</option>
                                            @foreach ($alumnis as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ $donasis->alumni_id == $data->id ? 'selected' : '' }}>
                                                    {{ $data->nama ?? '-' }}</option>
                                            @endforeach
                                        </select>
                                        @error('alumni_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Nama Donasi</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama', $donasis->nama) }}" placeholder="Masukan nama donasi">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Tanggal</label>
                                        <input type="date" name="tanggal"
                                            class="form-control @error('tanggal') is-invalid @enderror"
                                            value="{{ old('tanggal', $donasis->tanggal) }}">
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Jumlah Donasi</label>
                                        <input type="text" name="jumlah_donasi"
                                            class="form-control @error('jumlah_donasi') is-invalid @enderror"
                                            value="{{ old('jumlah_donasi', $donasis->jumlah_donasi ?? '-') }}" placeholder="Masukan jumlah donasi">
                                        @error('jumlah_donasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('custom-script')
    <script>
        $(document).ready(function() {
            $('#selectedAlumni').select2({
                theme: 'bootstrap4'
            });
            $('#selectedPengurus').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush
