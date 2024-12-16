<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Barang Keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 10px;
        }
        .item-title {
            font-weight: 600;
            color: #343a40;
        }
        .item-date {
            font-size: 1rem;
            color: #6c757d;
            font-weight: bold;
        }
        .item-amount {
            font-size: 1.2rem;
            color: #007bff;
            font-weight: bold;
        }
        .item-description {
            font-size: 1rem;
            color: #495057;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body p-4">
                        <h3 class="item-title">{{ $barangkeluar->nama_barang }}</h3>
                        <hr/>
                        <p class="item-date">Tanggal Keluar: {{ $barangkeluar->tanggal_keluar }}</p>
                        <p class="item-amount">Jumlah: {{ $barangkeluar->jumlah }}</p>
                        <div class="item-description">
                            <strong>Keterangan:</strong><br/>
                            {{ $barangkeluar->keterangan ?? 'Tidak ada keterangan' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
