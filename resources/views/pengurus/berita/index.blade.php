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
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('pengurus-berita.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            Tambahkan Data Berita
                        </a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 5%; text-align:center">No.</th>
                                    <th style="text-align:center">Judul</th>
                                    <th style="text-align:center">Tanggal</th>
                                    <th style="text-align:center">Subjudul</th>
                                    <th style="text-align:center">Keterangan</th>
                                    <th style="text-align:center">Gambar</th>
                                    <th style="text-align:center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($beritas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->judul ?? '-' }}</td>
                                        <td>{{ $data->tanggal ?? '-' }}</td>
                                        <td>{{ $data->subjudul ?? '-' }}</td>
                                        <td>{!! $data->keterangan ?? '-' !!}</td>
                                        <td>
                                            @if (!empty($data->gambar_berita))
                                                <img src="{{ asset('storage/' . $data->gambar_berita) }}" width="80"
                                                    class="img-fluid" alt="gambar">
                                            @else
                                                <img src="{{ asset('images/foto-profile.png') }}" width="80"
                                                    class="img-fluid" alt="gambar">
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <form action="{{ route('pengurus-berita.destroy', $data->id) }}" method="POST">
                                                @csrf
                                                <a href="{{ route('pengurus-berita.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-outline-danger mx-2"
                                                    id="hapusData">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </td>
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
    <script>
        // Mendengarkan acara klik tombol hapus
        $(document).on('click', '#hapusData', function(event) {
            event.preventDefault(); // Mencegah perilaku default tombol

            // Ambil URL aksi penghapusan dari atribut 'action' formulir
            var deleteUrl = $(this).closest('form').attr('action');

            // Tampilkan SweetAlert saat tombol di klik
            Swal.fire({
                icon: 'question',
                title: 'Hapus Data Berita ?',
                text: 'Apakah anda yakin untuk menghapus data ini?',
                showCancelButton: true, // Tampilkan tombol batal
                confirmButtonText: 'Ya',
                confirmButtonColor: '#28a745', // Warna hijau untuk tombol konfirmasi
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#dc3545' // Warna merah untuk tombol pembatalan
            }).then((result) => {
                // Lanjutkan jika pengguna mengkonfirmasi penghapusan
                if (result.isConfirmed) {
                    // Kirim permintaan AJAX DELETE ke URL penghapusan
                    $.ajax({
                        url: deleteUrl,
                        type: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}" // Kirim token CSRF untuk keamanan
                        },
                        success: function(response) {
                            // Tampilkan pesan sukses jika penghapusan berhasil
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Data successfully deleted.',
                                showConfirmButton: false,
                                timer: 1500 // Durasi pesan success (dalam milidetik)
                            });

                            // Refresh halaman setelah pesan sukses ditampilkan
                            setTimeout(function() {
                                window.location.reload();
                            }, 1500);
                        },
                        error: function(xhr, status, error) {
                            // Tampilkan pesan error jika penghapusan gagal
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Terjadi kesalahan saat menghapus data.',
                                showConfirmButton: false,
                                timer: 1500 // Durasi pesan error (dalam milidetik)
                            });
                        }
                    });
                }
            });
        });
    </script>
@endpush