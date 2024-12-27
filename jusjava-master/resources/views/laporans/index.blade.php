<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Laporan - JavaJuice</title>
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
        <div class="header">
            <h1>Kelola Laporan</h1>
            <p>Di sini Anda dapat menambah, mengedit, atau menghapus data laporan.</p>
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-custom">Kembali ke Dashboard</a>
            <button class="btn btn-info btn-custom" onclick="printPage()">Cetak Laporan</button> <!-- Tombol Cetak -->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Daftar Laporan</h5>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('laporans.create') }}" class="btn btn-success btn-custom">Tambah Laporan</a>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama Laporan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah Transaksi</th>
                                    <th scope="col" style="width: 20%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($laporans as $laporan)
                                    <tr>
                                        <td>{{ $laporan->id }}</td>
                                        <td>{{ $laporan->nama }}</td>
                                        <td>{{ $laporan->tanggal }}</td>
                                        <td>{{ $laporan->jumlah_transaksi }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('laporans.edit', $laporan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');" action="{{ route('laporans.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data laporan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $laporans->links() }} <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        function printPage() {
            window.print(); // Memanggil fungsi print browser
        }
    </script>
</body>
</html>
