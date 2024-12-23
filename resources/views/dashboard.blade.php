@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistem Manajemen Java Juice</h1>
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
                                <img src="{{ asset('storage/'.$product->image) }}" alt="Product Image" class="rounded" style="width: 150px;">
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

    {{-- Card Barang --}}
    <div class="card bg-dark text-white mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Barang</h3>
            <a href="{{ route('barangs.create') }}" class="btn btn-sm btn-success">Tambah Barang</a>
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
                    @forelse ($barangs as $barang)
                        <tr>
                            <td>{{ $barangkeluar->Nama_barang }}</td>
                            <td>{{ $barangkeluar->Jenis }}</td>
                            <td>{{ $barangkeluar->Jumlah }}</td>
                            <td class="text-center">
                                <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang keluar ini?');">
                                    <a href="{{ route('barangs.show', $barang->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
    
    {{-- Card Barang Masuk --}}
    <div class="card bg-dark text-white mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Barang Masuk</h3>
            <a href="{{ route('barang_masuks.create') }}" class="btn btn-sm btn-success">Tambah Barang Masuk</a>
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
                    @forelse ($barang_masuks as $barang_masuk)
                        <tr>
                            <td>{{ $barang_masuk->Nama_barang }}</td>
                            <td>{{ $barang_masuk->Jenis }}</td>
                            <td>{{ $barang_masuk->Jumlah }}</td>
                            <td class="text-center">
                                <form action="{{ route('barang_masuks.destroy', $barang_masuk->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang keluar ini?');">
                                    <a href="{{ route('barang_masuks.show', $barang_masuk->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('barang_masuks.edit', $barang_masuk->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
                                <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" style="display:inline-block;">
                                    <a href="{{ route('transaksis.show', $transaksi->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
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
{{-- Card Laporan --}}
<div class="card bg-dark text-white">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Laporan</h3>
            <div>
                <a href="{{ route('laporans.create') }}" class="btn btn-sm btn-success">Tambah Laporan</a>
                <button class="btn btn-sm btn-outline-light" onclick="printPage()">Print</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark table-hover">
                <thead>
                    <tr>
                    <th scope="col">Produk</th>
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

@section('js')
    <script>
        // Fungsi untuk mencetak halaman
        function printPage() {
            window.print();
        }
    </script>
@stop
