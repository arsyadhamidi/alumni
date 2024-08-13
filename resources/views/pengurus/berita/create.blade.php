@extends('admin.layout.master')
@section('menuPengurusBerita', 'active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Berita</h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <form action="{{ route('pengurus-berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('pengurus-berita.index') }}" class="btn btn-primary">
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
                                        <label>Tanggal Berita</label>
                                        <input type="date" name="tanggal"
                                            class="form-control @error('tanggal') is-invalid @enderror"
                                            value="{{ old('tanggal', \Carbon\Carbon::now()->format('Y-m-d')) }}" placeholder="Masukan tanggal berita">
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Judul Berita</label>
                                        <textarea name="judul" class="form-control @error('judul') is-invalid @enderror" rows="5" placeholder="Masukan judul berita">{{ old('judul') }}</textarea>
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>SubJudul Berita</label>
                                        <textarea name="subjudul" class="form-control @error('subjudul') is-invalid @enderror" rows="5" placeholder="Masukan subjudul berita">{{ old('subjudul') }}</textarea>
                                        @error('subjudul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Keterangan Berita</label>
                                        <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="5" placeholder="Masukan keterangan berita" id="keteranganId">{{ old('keterangan') }}</textarea>
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Upload Gambar</label>
                                        <input type="file" name="gambar_berita" class="form-control @error('gambar_berita') is-invalid @enderror">
                                        @error('gambar_berita')
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
        ClassicEditor
            .create(document.querySelector('#keteranganId'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
