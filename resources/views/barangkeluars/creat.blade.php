<!-- resources/views/barangkeluars/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Barang Keluar</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create Barang Keluar</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create barang keluar form -->
        <form action="{{ route('barangkeluars.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Barang:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Jumlah:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
            </div>

            <div class="form-group">
                <label for="date">Tanggal:</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
