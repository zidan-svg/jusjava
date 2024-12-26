<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<<<<<<< HEAD
    <title>Detail Transaksi</title>
=======
    <title>liat transaksi</title>
>>>>>>> master
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
<<<<<<< HEAD
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4 class="mb-4 text-muted">Detail Transaksi</h4>
                        <p><strong>Produk:</strong> {{ $transaksi->product->title }}</p>
                        <p><strong>Tanggal Transaksi:</strong> {{ $transaksi->Tanggal_transaksi }}</p>
                        <p><strong>Nama Pembeli:</strong> {{ $transaksi->Nama_pembeli }}</p>
                        <p><strong>Jumlah Barang:</strong> {{ $transaksi->Jumlah_barang }}</p>
                        <p><strong>Total Pembayaran:</strong> {{ "Rp " . number_format($transaksi->Total_pembayaran,2,',','.') }}</p>
                        <a href="{{ route('transaksis.index') }}" class="btn btn-md btn-primary mt-3">Kembali</a>
=======
        <div class="row">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3>{{ $transaksi->Tanggal_transaksi }}</h3>
                        <hr/>
                        <p>{{ "Rp " . number_format($transaksi->Total_pembayaran,2,',','.') }}</p>
                        <code>
                            <p>{!! $transaksi->Nama_pembeli !!}</p>
                        </code>
                        <p>Jumlah barang : {{ $transaksi->Jumlah_barang }}</p>
>>>>>>> master
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> master
