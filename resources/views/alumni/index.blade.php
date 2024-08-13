<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Biodata Alumni
                </div>
                <div class="card-body table-responsive">
                    <a href="{{ route('dashboard.biodata', $biodatas->id) }}" class="btn btn-primary mb-4">
                        <i class="fas fa-edit"></i>
                        Edit Biodata Alumni
                    </a>
                    <table class="table table-bordered">
                        <tr class="bg-primary text-white">
                            <th>Biodata</th>
                            <th colspan="2">Keterangan</th>
                        </tr>
                        <tr>
                            <td width="30%">Jurusan</td>
                            <td width="3%">:</td>
                            <td>{{ $biodatas->jurusan->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">NISN</td>
                            <td width="3%">:</td>
                            <td>{{ $biodatas->nisn ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Nama</td>
                            <td width="3%">:</td>
                            <td>{{ $biodatas->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Jenis Kelamin</td>
                            <td width="3%">:</td>
                            <td>{{ $biodatas->jekel ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Tahun Lulus</td>
                            <td width="3%">:</td>
                            <td>{{ $biodatas->tahunlulus ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Telepon</td>
                            <td width="3%">:</td>
                            <td>{{ $biodatas->telp ?? '-' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

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
