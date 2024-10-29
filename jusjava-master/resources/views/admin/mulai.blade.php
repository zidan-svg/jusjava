<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mulai Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ffcc80, #ffab40, #ff8a65);
            color: #ffffff;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        h1 {
            color: #ff5722;
        }
        p {
            color: #4caf50;
        }
        .btn {
            margin: 10px 0;
            transition: transform 0.3s ease;
        }
        .btn:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        /* Animasi buah */
        .fruit-icon {
            position: absolute;
            z-index: 0;
            opacity: 0.3;
            pointer-events: none; /* Buah tidak dapat di-klik */
        }
        .banana {
            top: 10%;
            left: 5%;
            animation: bounce 5s infinite alternate;
        }
        .apple {
            top: 20%;
            right: 10%;
            animation: bounce 4s infinite alternate;
        }
        .orange {
            bottom: 10%;
            left: 15%;
            animation: bounce 6s infinite alternate;
        }
        .grape {
            top: 40%;
            right: 15%;
            animation: bounce 3s infinite alternate;
        }
        /* Definisi animasi bounce */
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        /* Efek kilau */
        .sparkle {
            position: absolute;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 50%;
            animation: sparkle 1.5s infinite;
        }
        @keyframes sparkle {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(0);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container text-center animate__animated animate__fadeInUp">
        <h1 class="animate__animated animate__heartBeat">Selamat Datang di Halaman Admin</h1>
        <p class="animate__animated animate__pulse">Gunakan halaman ini untuk mengelola data barang, transaksi, dan laporan JavaJuice.</p>
        <a href="/barangs" class="btn btn-primary btn-lg">Kelola Barang</a>
        <a href="/barangmasuks" class="btn btn-secondary btn-lg">Barang Masuk</a>
        <a href="/barangkeluars" class="btn btn-success btn-lg">Barang Keluar</a>
        <a href="/products" class="btn btn-info btn-lg">Kelola Produk</a>
        <a href="/transaksis" class="btn btn-warning btn-lg">Transaksi</a>
        <a href="/laporans" class="btn btn-danger btn-lg">Laporan</a>
        <img src="https://img.icons8.com/color/100/000000/apple.png" alt="Apple" class="fruit-icon apple">
        <img src="https://img.icons8.com/color/100/000000/banana.png" alt="Banana" class="fruit-icon banana">
        <img src="https://img.icons8.com/color/100/000000/orange.png" alt="Orange" class="fruit-icon orange">
        
        <!-- Efek kilau -->
        <div class="sparkle" style="top: 10%; left: 15%; width: 30px; height: 30px; animation-delay: 0.5s;"></div>
        <div class="sparkle" style="top: 40%; right: 10%; width: 20px; height: 20px; animation-delay: 1s;"></div>
        <div class="sparkle" style="bottom: 20%; left: 20%; width: 25px; height: 25px; animation-delay: 1.5s;"></div>
    </div>
    
    <!-- Bootstrap JS dan dependensi -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
