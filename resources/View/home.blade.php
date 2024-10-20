<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="my-4">Selamat Datang di Aplikasi Stok Produk</h3>
                <p class="lead">Silakan pilih salah satu opsi di bawah ini:</p>
                <div class="my-4">
                    <a href="{{ route('products.index') }}" class="btn btn-lg btn-success">LIHAT PRODUK</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
