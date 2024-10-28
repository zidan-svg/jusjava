<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data barang keluar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Sistem Manajemen Java juice</h3>
                    <h3 class="text-center my-4">Data barang keluar</h3>

                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('barangkeluars.create') }}" class="btn btn-md btn-success mb-3">Tambahkan barang keluar</a>
                        <a href="{{ route('products.index') }}" class="btn btn-md btn-success mb-3">Produk</a>
                        <a href="{{ route('laporans.index') }}" class="btn btn-md btn-success mb-3">Laporan</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama barang keluar</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col" style="width: 20%">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barangkeluars as $barangkeluar)
                                    <tr>
                                        <td>{{ $barangkeluar->Nama_barang}}</td>
                                        <td>{{ $barangkeluar->Jenis }}</td>
                                        <td>{{ $barangkeluar->Jumlah}}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barangkeluars.destroy', $barangkeluar->id) }}" method="POST">
                                                <a href="{{ route('barangkeluars.show', $barangkeluar->id) }}" class="btn btn-sm btn-dark">Lihat</a>
                                                <a href="{{ route('barangkeluars.edit', $barangkeluar->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </td>       
                                    </tr>
                                @empty
                                    <div class="alert alert-success">
                                        Data Transaksi belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $barangkeluars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

         @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>