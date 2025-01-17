@extends('admin.layout.master')
@section('menuDashboard', 'active')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Setting</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            @if ($users->foto_profile)
                                <img src="{{ asset('storage/' . $users->foto_profile) }}" class="img-fluid rounded-cirlce" style="width: 150px; height:150px; object-fit: cover">
                            @else
                                <img src="{{ asset('admin/img/undraw_profile.svg') }}" class="img-fluid" width="150">
                            @endif
                        </div>
                        <div class="mb-3 text-center">
                            <h3>{{ $users->name ?? '-' }}</h3>
                            <p>{{ $users->level->namalevel ?? '-' }}</p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label><b>Nama Lengkap</b></label>
                            <p><i>{{ $users->name ?? '-' }}</i></p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label><b>Username</b></label>
                            <p><i>{{ $users->username ?? '-' }}</i></p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label><b>Status</b></label>
                            <p><i>{{ $users->level->namalevel ?? '-' }}</i></p>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label><b>Telepon</b></label>
                            <p><i>{{ $users->telp ?? '-' }}</i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <div class="card mb-4">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">Profile</button>
                                <button class="nav-link mx-3" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">Username</button>
                                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                    aria-selected="false">Password</button>
                                <button class="nav-link mx-2" id="nav-contact-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-gambar" type="button" role="tab" aria-controls="nav-gambar"
                                    aria-selected="false">Update Gambar</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <form action="{{ route('setting.updateprofile') }}" method="POST" class="mt-4">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $users->name ?? '-') }}"
                                            placeholder="Masukan nama lengkap">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Telepon</label>
                                        <input type="number" name="telp"
                                            class="form-control @error('telp') is-invalid @enderror"
                                            value="{{ old('telp', $users->telp ?? '-') }}"
                                            placeholder="Masukan nomor telepon">
                                        @error('telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i>
                                        Simpan Data
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <form action="{{ route('setting.updateusername') }}" method="POST" class="mt-4">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Username Lama</label>
                                        <input type="text" name="usernamelama"
                                            class="form-control @error('usernamelama') is-invalid @enderror"
                                            value="{{ old('usernamelama', $users->username ?? '-') }}"
                                            placeholder="Masukan username" readonly>
                                        @error('usernamelama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Masukan username">
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i>
                                        Simpan Data
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <form action="{{ route('setting.updatepassword') }}" method="POST" class="mt-4">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password') }}" placeholder="Masukan password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label>Konfirmasi Password</label>
                                        <input type="password" name="konfirmasi"
                                            class="form-control @error('konfirmasi') is-invalid @enderror"
                                            placeholder="Masukan konfirmasi password">
                                        @error('konfirmasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i>
                                        Simpan Data
                                    </button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-gambar" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <form action="{{ route('setting.updategambar') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label>Foto Profile</label>
                                        <input type="file" name="foto_profile"
                                            class="form-control @error('foto_profile') is-invalid @enderror"
                                            value="{{ old('foto_profile') }}">
                                        @error('foto_profile')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i>
                                        Simpan Data
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!empty($users->foto_profile))
                <div class="mb-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('setting.hapusgambar') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                Apakah Anda yakin ingin menghapus foto profil Anda? Tindakan ini tidak dapat dibatalkan dan
                                foto
                                profil akan dihapus secara permanen.
                                <br>
                                <br>
                                <button type="submit" class="btn btn-danger" id="hapusData">
                                    <i class='bx bx-trash'></i>
                                    Hapus Gambar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
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
                title: 'Hapus Foto Profile?',
                text: 'Apakah anda yakin untuk menghapus foto profile?',
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
