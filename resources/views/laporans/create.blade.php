<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Laporan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<<<<<<< HEAD
</head>
<body style="background: lightgray">

    <div>
        <h3 class="text-center my-4">Tambahkan Laporan</h3>
     </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('laporans.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Tanggal</label>
                                <input type="date" class="form-control @error('Tanggal') is-invalid @enderror" name="Tanggal">
                            
                                <!-- error message untuk image -->
                                @error('Tanggal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Jumlah barang</label>
                                        <input type="number" class="form-control @error('Jumlah_barang') is-invalid @enderror" name="Jumlah_barang" value="{{ old('Jumlah_barang') }}" placeholder="Masukkan Jumlah barang">
                                    
                                        <!-- error message untuk stock -->
                                        @error('Jumlah_barang')
                                         <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                     @enderror
                             </div>
                         </div>
                            
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Pendapatan</label>
                                <input type="number" class="form-control @error('Pendapatan') is-invalid @enderror" name="Pendapatan" value="{{ old('Pendapatan') }}" placeholder="Masukkan Pendapatan">
                            
                                <!-- error message untuk title -->
                                @error('Pendapatan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <button type="submit" class="btn btn-md btn-primary me-3">Simpan</button>
                            <button type="reset" class="btn btn-md btn-warning">Ulangi</button>
=======
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 15px;
        }
        .form-label {
            font-weight: 600;
        }
        .btn-custom {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h3 class="my-4">Tambah Laporan Baru</h3>
            <hr class="mb-5">
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <form action="{{ route('laporans.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="image" class="form-label">Gambar Laporan</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="title" class="form-label">Judul Laporan</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Laporan">
                                @error('title')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="description" class="form-label">Deskripsi Laporan</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="5" placeholder="Masukkan Deskripsi Laporan">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="date" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" placeholder="Masukkan Tanggal Laporan">
                                    @error('date')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="total" class="form-label">Total Pendapatan</label>
                                    <input type="number" class="form-control @error('total') is-invalid @enderror" name="total" value="{{ old('total') }}" placeholder="Masukkan Total Pendapatan">
                                    @error('total')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-md btn-custom me-2">Simpan</button>
                                <button type="reset" class="btn btn-warning btn-md btn-custom">Ulangi</button>
                            </div>
>>>>>>> master

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<<<<<<< HEAD
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR5.replace( 'description' );
    </script>
</body>
</html>
=======
</body>
</html>
>>>>>>> master
