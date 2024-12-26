@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<<<<<<< HEAD
    <h1>Sistem Manajemen Toko Alat Pancing</h1>
=======
    <h1>Sistem Manajemen Java Juice</h1>
>>>>>>> master
@stop

@section('content')
    {{-- Card Daftar Produk --}}
    <div class="card bg-dark text-white mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Produk</h3>
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">Tambah Produk</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col" style="width: 20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td class="text-center">
<<<<<<< HEAD
                                <img src="{{ asset('storage/'.$product->image) }}" class="rounded" style="width: 150px">
=======
                            <img src="https://via.placeholder.com/150" alt="Placeholder Image" class="rounded" style="width: 150px;">

>>>>>>> master
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td class="text-center">
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display: inline-block;">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="alert alert-success">Data Produk belum tersedia.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

<<<<<<< HEAD
=======
    {{-- Card Barang Keluar --}}
    <div class="card bg-dark text-white mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Barang Keluar</h3>
            <a href="{{ route('barangkeluars.create') }}" class="btn btn-sm btn-success">Tambah Barang Keluar</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Keluar</th>
                        <th scope="col" style="width: 20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangkeluars as $barangkeluar)
                        <tr>
                            <td>{{ $barangkeluar->nama_barang }}</td>
                            <td>{{ $barangkeluar->jumlah }}</td>
                            <td>{{ $barangkeluar->tanggal_keluar }}</td>
                            <td class="text-center">
                                <form action="{{ route('barangkeluars.destroy', $barangkeluar->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang keluar ini?');">
                                    <a href="{{ route('barangkeluars.show', $barangkeluar->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('barangkeluars.edit', $barangkeluar->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="alert alert-success">Data Barang Keluar belum tersedia.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
  



>>>>>>> master
    {{-- Card Transaksi --}}
    <div class="card bg-dark text-white mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Transaksi</h3>
            <a href="{{ route('transaksis.create') }}" class="btn btn-sm btn-success">Tambah Transaksi</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark table-hover">
                <thead>
                    <tr>
                        <th scope="col">Produk</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Jumlah produk</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col" style="width: 20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->product->title }}</td>
                            <td>{{ $transaksi->Tanggal_transaksi }}</td>
                            <td>{{ $transaksi->Jumlah_barang }}</td>
                            <td>{{ 'Rp ' . number_format($transaksi->Total_pembayaran, 2, ',', '.') }}</td>
                            <td class="text-center">
<<<<<<< HEAD
                                <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">
=======
                                <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" style="display:inline-block;">
>>>>>>> master
                                    <a href="{{ route('transaksis.show', $transaksi->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
<<<<<<< HEAD
                                    <a href="{{ route('transaksis.batal', $transaksi->id) }}" class="btn btn-sm btn-outline-primary me-1">Batal</a>
=======
>>>>>>> master
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="alert alert-success">Data Transaksi belum tersedia.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
<<<<<<< HEAD

    {{-- Card Laporan --}}
    <div class="card bg-dark text-white">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Laporan</h3>
            <a href="{{ route('laporans.create') }}" class="btn btn-sm btn-success">Tambah Laporan</a>
=======
{{-- Card Laporan --}}
<div class="card bg-dark text-white">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Laporan</h3>
            <div>
                <a href="{{ route('laporans.create') }}" class="btn btn-sm btn-success">Tambah Laporan</a>
                <button class="btn btn-sm btn-outline-light" onclick="printPage()">Print</button>
            </div>
>>>>>>> master
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark table-hover">
                <thead>
<<<<<<< HEAD
                    <tr>
=======
                    <tr>.
>>>>>>> master
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pendapatan</th>
                        <th scope="col" style="width: 20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laporans as $laporan)
                        <tr>
                            <td>{{ $laporan->Tanggal }}</td>
                            <td>{{ 'Rp ' . number_format($laporan->Pendapatan, 2, ',', '.') }}</td>
                            <td class="text-center">
                                <form action="{{ route('laporans.destroy', $laporan->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">
                                    <a href="{{ route('laporans.show', $laporan->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('laporans.edit', $laporan->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="alert alert-success">Data Laporan belum tersedia.</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
<<<<<<< HEAD
=======

@section('js')
    <script>
        // Fungsi untuk mencetak halaman
        function printPage() {
            window.print();
        }
    </script>
@stop
>>>>>>> master
