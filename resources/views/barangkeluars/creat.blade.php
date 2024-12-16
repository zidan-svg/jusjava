@extends('adminlte::page')

@section('title', 'Tambah Barang Keluar')

@section('content')
<div class="container mt-5">
    <h2>Tambah Barang Keluar</h2>
    <form action="{{ route('barangkeluars.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input 
                type="text" 
                name="nama_barang" 
                id="nama_barang" 
                class="form-control @error('nama_barang') is-invalid @enderror" 
                value="{{ old('nama_barang') }}" 
                required>
            @error('nama_barang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jumlah">Jumlah</label>
            <input 
                type="number" 
                name="jumlah" 
                id="jumlah" 
                class="form-control @error('jumlah') is-invalid @enderror" 
                value="{{ old('jumlah') }}" 
                required>
            @error('jumlah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input 
                type="date" 
                name="tanggal_keluar" 
                id="tanggal_keluar" 
                class="form-control @error('tanggal_keluar') is-invalid @enderror" 
                value="{{ old('tanggal_keluar') }}" 
                required>
            @error('tanggal_keluar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea 
                name="keterangan" 
                id="keterangan" 
                class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
