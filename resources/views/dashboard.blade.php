@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Sistem Manajemen Toko Alat Pancing</h1>
@stop

@section('content')
    {{-- Card Daftar Produk --}}
    <div class="card bg-dark text-white mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Produk</h3>
            <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">Tambah Produk</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark">
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
                                <img src="{{ asset('/public/products/'.$product->image) }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ "Rp " . number_format($product->price,2,',','.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="alert alert-success">
                                    Data Produk belum tersedia.
                                </div>
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
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="col">Tanggal transaksi</th>
                        <th scope="col">Jumlah barang</th>
                        <th scope="col">Total pembayaran</th>
                        <th scope="col" style="width: 20%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->Tanggal_transaksi }}</td>
                            <td>{{ $transaksi->Jumlah_barang }}</td>
                            <td>{{ "Rp " . number_format($transaksi->Total_pembayaran,2,',','.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('transaksis.show', $transaksi->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                <!-- Form untuk hapus transaksi -->
                                <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="alert alert-success">
                                    Data Transaksi belum tersedia.
                                </div>
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
            <a href="{{ route('laporans.create') }}" class="btn btn-sm btn-success">Tambah Laporan</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-dark">
                <thead>
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
                                <a href="{{ route('laporans.show', $laporan->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                <a href="{{ route('laporans.edit', $laporan->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                <!-- Form untuk hapus laporan -->
                                <form action="{{ route('laporans.destroy', $laporan->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="alert alert-success">
                                    Data Laporan belum tersedia.
                                </div>
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
