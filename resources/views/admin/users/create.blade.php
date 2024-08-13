@extends('admin.layout.master')
@section('menuDataAutentikasi', 'active')
@section('menuDataUsersRegistrasi', 'active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Users Registrasi</h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <form action="{{ route('data-user.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('data-user.index') }}" class="btn btn-primary">
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
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" placeholder="Masukan Nama Lengkap">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            value="{{ old('username') }}" placeholder="Masukan username">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Status Autentikasi</label>
                                        <select name="level_id" class="form-control @error('level_id') is-invalid @enderror"
                                            id="selectedLevel">
                                            <option value="" selected>Pilih Status Autentikasi</option>
                                            @foreach ($levels as $data)
                                                <option value="{{ $data->id_level }}"
                                                    {{ old('level_id') == $data->id ? 'selected' : '' }}>
                                                    {{ $data->namalevel ?? '-' }}</option>
                                            @endforeach
                                        </select>
                                        @error('level_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Telepon</label>
                                        <input type="number" name="telp"
                                            class="form-control @error('telp') is-invalid @enderror"
                                            value="{{ old('telp') }}" placeholder="Masukan nomor telepon">
                                        @error('telp')
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
            $('#selectedLevel').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush
