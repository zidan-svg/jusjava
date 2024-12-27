<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin - Buah-Buahan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Animate.css untuk animasi -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ffcc80, #ffab40, #ff8a65); /* Gradien cerah */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            color: #ffffff; /* Warna teks putih untuk kontras */
            position: relative;
            font-family: 'Comic Sans MS', cursive, sans-serif; /* Font ceria */
        }
        .card {
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.9); /* Latar belakang putih transparan */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            z-index: 1; /* Menempatkan card di atas dekorasi */
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.4);
        }
        .btn-primary {
            background-color: #ff5722; /* Warna oranye cerah */
            border-color: #ff5722;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #e64a19; /* Warna oranye lebih gelap */
            transform: scale(1.1);
        }
        .fade-in {
            animation: fadeIn 1s ease forwards;
            opacity: 0;
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .fruit-icon {
            font-size: 50px; /* Ukuran ikon buah yang lebih besar */
            margin: 10px; /* Jarak antar ikon */
            color: #ffeb3b; /* Warna kuning cerah untuk ikon */
            animation: bounce 1s infinite; /* Animasi bounce */
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center animate__animated animate__fadeInDown">
                    <div class="card-body">
                        <h1 class="card-title" style="color: #ff5722;">Selamat Datang di Halaman Admin</h1>
                        <p class="card-text">
                            <i class="fas fa-apple-alt fruit-icon"></i>
                            <i class="fas fa-banana fruit-icon"></i>
                            <i class="fas fa-lemon fruit-icon"></i>
                            <i class="fas fa-watermelon fruit-icon"></i>
                            <i class="fas fa-grapes fruit-icon"></i>
                            <i class="fas fa-cherry-blossom fruit-icon"></i>
                            <i class="fas fa-orange fruit-icon"></i>
                            <i class="fas fa-strawberry fruit-icon"></i>
                            <i class="fas fa-pineapple fruit-icon"></i>
                            <i class="fas fa-peach fruit-icon"></i>
                        </p>
                        <p class="card-text" style="color: #4caf50;">Kelola data JavaJuice dengan mudah dan cepat.</p>
                        <a href="dashboard" class="btn btn-primary btn-lg mt-4 animate__animated animate__pulse animate__infinite">
                            <i class="fas fa-play"></i> Mulai
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS dan dependensi -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
