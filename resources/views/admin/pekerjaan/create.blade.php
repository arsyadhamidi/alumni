@extends('admin.layout.master')
@section('menuDataMaster', 'active')
@section('menuDataPekerjaan', 'active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Pekerjaan</h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <form action="{{ route('data-pekerjaan.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('data-pekerjaan.index') }}" class="btn btn-primary">
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
                                        <label>Pilih Alumni</label>
                                        <select name="alumni_id" class="form-control @error('alumni_id') is-invalid @enderror"
                                            id="selectedAlumni">
                                            <option value="" selected>Pilih Alumni</option>
                                            @foreach ($alumnis as $data)
                                                <option value="{{ $data->id }}"
                                                    {{ old('alumni_id') == $data->id ? 'selected' : '' }}>
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
                                        <label>Nama Pekerjaan</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            value="{{ old('nama') }}" placeholder="Masukan Pekerjaan">
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Tempat Pekerjaan</label>
                                        <input type="text" name="tempat"
                                            class="form-control @error('tempat') is-invalid @enderror"
                                            value="{{ old('tempat') }}" placeholder="Masukan tempat pekerjaan">
                                        @error('tempat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Jenis Pekerjaan</label>
                                        <input type="text" name="jenis_pekerjaan"
                                            class="form-control @error('jenis_pekerjaan') is-invalid @enderror"
                                            value="{{ old('jenis_pekerjaan') }}" placeholder="Masukan jenis pekerjaan">
                                        @error('jenis_pekerjaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Alamat Pekerjaan</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="5" placeholder="Masukan alamat pekerjaan">{{ old('alamat') }}</textarea>
                                        @error('alamat')
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
        });
    </script>
@endpush
