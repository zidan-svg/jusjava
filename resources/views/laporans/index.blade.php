<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 15px;
        }
        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
        .btn-custom {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div>
                    <h3 class="text-center my-4">Sistem Manajemen Alat Pancing</h3>
                    <h4 class="text-center mb-4 text-muted">Laporan</h4>
                    <hr>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <form action="{{ route('laporans.index') }}" method="GET" class="mb-3">
                                <label for="month" class="form-label">Pilih Bulan:</label>
                                <select name="month" id="month" class="form-control">
                                    @foreach(range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ isset($month) && $m == $month ? 'selected' : '' }}>
                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-primary mt-2">Filter</button>
                            </form>
                            <div>
                                <a href="{{ route('dashboard') }}" class="btn btn-md btn-outline-secondary btn-custom">Dashboard</a>
                                <a href="{{ route('transaksis.index') }}" class="btn btn-md btn-outline-info btn-custom">Transaksi</a>
                                <a href="{{ route('products.index') }}" class="btn btn-md btn-outline-primary btn-custom">Produk</a>
                                <a href="{{ route('laporans.create') }}" class="btn btn-md btn-outline-success btn-custom">Tambah Laporan</a>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pendapatan</th>
                                    <th>Jumlah Barang</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($laporans as $laporan)
                                    <tr>
                                        <td>{{ $laporan->Tanggal ?? date('Y-m-d') }}</td>
                                        <td>{{ isset($laporan->Pendapatan) ? number_format($laporan->Pendapatan, 0, ',', '.') : '0' }}</td>
                                        <td>{{ $laporan->Jumlah_barang ?? '0' }}</td>
                                        <td>
                                            <a href="{{ route('laporans.show', $laporan->id) }}" class="btn btn-sm btn-info">Detail</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data untuk bulan ini.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Tampilkan pagination -->
                        <div class="mt-3">
                            {{ $laporans->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>

</body>
</html>
