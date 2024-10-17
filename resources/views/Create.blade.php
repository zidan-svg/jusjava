<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
</head>
<body>
    <h1>Tambah Produk</h1>

    <form action="{{ route('produks.store') }}" method="POST">
        @csrf
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" name="nama" required><br><br> <!-- Ubah nama_produk menjadi nama -->

        <label for="harga">Harga:</label>
        <input type="number" name="harga" required><br><br>

        <label for="stok">Stok:</label>
        <input type="number" name="stok" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
