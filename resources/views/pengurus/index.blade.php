<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Biodata Pengurus
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr class="bg-primary text-white">
                            <th>Biodata</th>
                            <th colspan="2">Keterangan</th>
                        </tr>
                        <tr>
                            <td width="30%">Nama Lengkap</td>
                            <td width="3%">:</td>
                            <td>{{ $penguruss->nama ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Jenis Kelamin</td>
                            <td width="3%">:</td>
                            <td>{{ $penguruss->jekel ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Jabatan</td>
                            <td width="3%">:</td>
                            <td>{{ $penguruss->jabatan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td width="30%">Telepon</td>
                            <td width="3%">:</td>
                            <td>{{ $penguruss->telp ?? '-' }}</td>
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
