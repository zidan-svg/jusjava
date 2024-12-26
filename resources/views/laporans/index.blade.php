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
<<<<<<< HEAD
                            <a href="{{ route('laporans.create') }}" class="btn btn-md btn-success btn-custom">+ Tambah Laporan</a>
=======
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
>>>>>>> master
                            <div>
                                <a href="{{ route('dashboard') }}" class="btn btn-md btn-outline-secondary btn-custom">Dashboard</a>
                                <a href="{{ route('transaksis.index') }}" class="btn btn-md btn-outline-info btn-custom">Transaksi</a>
                                <a href="{{ route('products.index') }}" class="btn btn-md btn-outline-primary btn-custom">Produk</a>
<<<<<<< HEAD
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Pendapatan</th>
                                    <th scope="col" style="width: 20%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($laporans as $laporan)
                                    <tr>
                                        <td>{{ $laporan->Tanggal }}</td>
                                        <td>{{ "Rp " . number_format($laporan->Pendapatan,2,',','.') }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('laporans.destroy', $laporan->id) }}" method="POST">
                                                <a href="{{ route('laporans.show', $laporan->id) }}" class="btn btn-sm btn-outline-dark me-1">Lihat</a>
                                                <a href="{{ route('laporans.edit', $laporan->id) }}" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            <div class="alert alert-warning my-3">Data laporan belum tersedia.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-3">
=======
                                <a href="{{ route('laporans.create') }}" class="btn btn-md btn-outline-success btn-custom">Tambah Laporan</a>
                            </div>
                        </div>
                        <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Nama Pembeli</th>
                <th>Jumlah Barang</th>
                <th>Total Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $laporan->Tanggal_transaksi }}</td>
                    <td>{{ $laporan->Nama_pembeli }}</td>
                    <td>{{ $laporan->Jumlah_barang }}</td>
                    <td>{{ $laporan->Total_pembayaran }}</td>
                    <td>
                        <a href="{{ route('laporans.show', $laporan->id) }}">Lihat</a>
                        <form action="{{ route('laporans.destroy', $laporan->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

                        <!-- Tampilkan pagination -->
                        <div class="mt-3">
>>>>>>> master
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
<<<<<<< HEAD
         @if(session('success'))
=======
        @if(session('success'))
>>>>>>> master
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
