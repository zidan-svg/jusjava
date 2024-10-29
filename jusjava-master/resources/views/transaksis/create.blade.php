<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div>
        <h3 class="text-center my-4">Tambahkan Transaksi</h3>
     </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('transaksis.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal transaksi</label>
                                <input type="date" class="form-control @error('Tanggal_transaksi') is-invalid @enderror" value="{{ old('Tanggal_transaksi') }}" name="Tanggal_transaksi">
                            
                                <!-- error message untuk image -->
                                @error('Tanggal_transaksi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama pembeli</label>
                                <input type="text" class="form-control @error('Nama_pembeli') is-invalid @enderror" name="Nama_pembeli" value="{{ old('Nama_pembeli') }}" placeholder="Masukkan Nama pembeli">
                            
                                <!-- error message untuk title -->
                                @error('Nama_pembeli')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Jumlah barang</label>
                                        <input type="number" class="form-control @error('Jumlah_barang') is-invalid @enderror" name="Jumlah_barang" value="{{ old('Jumlah_barang') }}" placeholder="Masukkan Jumlah barang">
                                    
                                        <!-- error message untuk price -->
                                        @error('Jumlah_barang')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Total pembayaran</label>
                                        <input type="number" class="form-control @error('Total_pembayaran') is-invalid @enderror" name="Total_pembayaran" value="{{ old('Total_pembayaran') }}" placeholder="Masukkan Total pembayaran">
                                    
                                        <!-- error message untuk stock -->
                                        @error('Total_pembayaran')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">Simpan</button>
                            <button type="reset" class="btn btn-md btn-warning">Ulangi</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR5.replace( 'description' );
    </script>
</body>
</html>