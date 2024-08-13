@extends('admin.layout.master')
@section('menuPengurusAlumni', 'active')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Alumni</h1>
    </div>

    <div class="row">
        <div class="col-lg">
            <form action="{{ route('pengurus-alumni.update', $alumnis->id) }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('pengurus-alumni.alumni', $alumnis->jurusan_id) }}" class="btn btn-primary">
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
                                    <label>Jurusan</label>
                                    <input type="text" name="jurusan_id" class="form-control" value="{{ $alumnis->jurusan_id ?? '-' }}" hidden>
                                    <input type="text" class="form-control" value="{{ $alumnis->jurusan->nama ?? '-' }}" readonly>
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>NISN</label>
                                    <input type="text" name="nisn" class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn', $alumnis->nisn ?? '-') }}" placeholder="Masukan nisn">
                                    @error('nisn')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $alumnis->nama ?? '-') }}" placeholder="Masukan Nama Lengkap">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Jenis Kelamin</label>
                                    <select name="jekel" class="form-control @error('jekel') is-invalid @enderror" id="selectedJekel">
                                        <option value="" selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki" {{ $alumnis->jekel == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="Perempuan" {{ $alumnis->jekel == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jekel')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Tahun Lulus</label>
                                    <input type="number" name="tahunlulus" class="form-control @error('tahunlulus') is-invalid @enderror" value="{{ old('tahunlulus', $alumnis->tahunlulus) }}" placeholder="Masukan Tahun Lulus">
                                    @error('tahunlulus')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="mb-3">
                                    <label>Telepon</label>
                                    <input type="number" name="telp" class="form-control @error('telp') is-invalid @enderror" value="{{ old('telp', $alumnis->telp ?? '-') }}" placeholder="Masukan Nomor Telepon">
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
            $('#selectedJekel').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endpush