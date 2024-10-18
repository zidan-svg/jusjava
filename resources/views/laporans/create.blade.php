<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Laporan Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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