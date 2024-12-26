<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Barang Keluar</title>
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
            background-color: #f1f1f1;
        }
        .btn-custom {
            font-weight: bold;
            
    <title>Kelola Barang Keluar - JavaJuice</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Mengganti font -->
    <style>
        body {
            background: linear-gradient(135deg, #ffcc00, #ff6699); /* Warna latar belakang ceria */
            color: #333; /* Warna teks */
            font-family: 'Roboto', sans-serif; /* Font baru */
        }
        .header {
            background-color: #ff3366; /* Warna header */
            color: white; /* Warna teks header */
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
            animation: fadeIn 1s; /* Animasi saat muncul */
        }
        .card {
            border: none;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Bayangan untuk kartu */
            transition: transform 0.3s; /* Transisi saat hover */
        }
        .card:hover {
            transform: translateY(-5px); /* Efek angkat saat hover */
        }
        .card-header {
            background-color: #ffcc00; /* Warna header kartu */
            color: #333; /* Warna teks header kartu */
            border-radius: 10px 10px 0 0;
        }
        .btn-custom {
            margin-bottom: 10px;
            transition: transform 0.3s, background-color 0.3s;
        }
        .btn-custom:hover {
            transform: scale(1.1);
            background-color: #ff9933; /* Warna tombol saat hover */
        }
        .table {
            background: white; /* Warna latar belakang tabel */
            border-radius: 10px; /* Sudut membulat tabel */
        }
        th {
            background-color: #ff6699; /* Warna header tabel */
            color: white; /* Warna teks header tabel */
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }

        }
    </style>
</head>
<body>

    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div>
                    <h3 class="text-center my-4">Sistem Manajemen Java Juice</h3>
                    <h4 class="text-center mb-4 text-muted">Data Barang Keluar</h4>
                    <hr>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('barangkeluars.create') }}" class="btn btn-md btn-success btn-custom">+ Tambah Barang Keluar</a>
                            <div>
                                <a href="{{ route('dashboard') }}" class="btn btn-md btn-outline-secondary btn-custom">Dashboard</a>
                                <a href="{{ route('transaksis.index') }}" class="btn btn-md btn-outline-info btn-custom">Transaksi</a>
                                <a href="{{ route('laporans.index') }}" class="btn btn-md btn-outline-primary btn-custom">Laporan</a>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Stok</th>

        <div class="header">
            <h1>Kelola Barang Keluar</h1>
            <p>Di sini Anda dapat menambah, mengedit, atau menghapus data barang keluar.</p>
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-custom">Kembali ke Dashboard</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Barang Keluar</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('barangkeluars.create') }}" class="btn btn-success btn-custom">Tambah Barang Keluar</a>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Jumlah</th>

                                    <th scope="col" style="width: 20%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barangkeluars as $barangkeluar)
                                    <tr>

                                        <td class="text-center">
                                            <img src="{{ asset('/storage/'.$barangkeluar->image) }}" class="rounded" style="width: 100px; height: auto;">
                                        </td>
                                        <td>{{ $barangkeluar->title }}</td>
                                        <td>{{ "Rp " . number_format($barangkeluar->price,2,',','.') }}</td>
                                        <td>{{ $barangkeluar->stock }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangkeluars.destroy', $barangkeluar->id) }}" method="POST">
                                                <a href="{{ route('barangkeluars.show', $barangkeluar->id) }}" class="btn btn-sm btn-outline-dark me-1">Lihat</a>
                                                <a href="{{ route('barangkeluars.edit', $barangkeluar->id) }}" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
=======
                                        <td>{{ $barangkeluar->id }}</td>
                                        <td>{{ $barangkeluar->nama }}</td>
                                        <td>{{ $barangkeluar->jenis }}</td>
                                        <td>{{ $barangkeluar->jumlah }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('barangkeluars.edit', $barangkeluar->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" action="{{ route('barangkeluars.destroy', $barangkeluar->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
>>>>>>> bab818e6c8f5e67fcf4c4f94d1ab115d94476a78
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>

                                        <td colspan="5" class="text-center">
                                            <div class="alert alert-warning my-3">Data Barang Keluar belum Tersedia.</div>
                                        </td>

                                        <td colspan="5" class="text-center">Tidak ada data barang keluar.</td>

                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-3">
                            {{ $barangkeluars->links() }}
                        </div>

                        {{ $barangkeluars->links() }} <!-- Pagination -->

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


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
