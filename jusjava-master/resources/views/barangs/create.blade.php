<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div>
        <h3 class="text-center my-4">Tambahkan Barang</h3>
     </div>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('barangs.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama barang</label>
                                <input type="text" class="form-control @error('Nama_barang') is-invalid @enderror" value="{{ old('Nama_barang') }}" name="Nama_barang" placeholder="Masukkan Nama barang">
                            
                                <!-- error message untuk image -->
                                @error('Nama_barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Jenis</label>
                                <input type="text" class="form-control @error('Jenis') is-invalid @enderror" name="Jenis" value="{{ old('Jenis') }}" placeholder="Masukkan Jenis">
                            
                                <!-- error message untuk title -->
                                @error('Jenis')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Jumlah</label>
                                        <input type="number" class="form-control @error('Jumlah') is-invalid @enderror" name="Jumlah" value="{{ old('Jumlah') }}" placeholder="Masukkan Jumlah barang">
                                    
                                        <!-- error message untuk price -->
                                        @error('Jumlah')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">Deskripsi</label>
                                        <input type="text" class="form-control @error('Deskripsi') is-invalid @enderror" name="Deskripsi" value="{{ old('Deskripsi') }}" placeholder="Masukkan Deskripsi">
                                    
                                        <!-- error message untuk stock -->
                                        @error('Deskripsi')
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