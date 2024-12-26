<<<<<<< HEAD
@extends('adminlte::page')

@section('title', 'Tambah Barang Keluar')

@section('content')
<div class="container mt-5">
    <h2>Tambah Barang Keluar</h2>
    <form action="{{ route('barangkeluars.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
