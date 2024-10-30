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
            background: linear-gradient(135deg, #ffd54f, #ffb300, #ff7043); /* Gradien lebih cerah */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #ffffff;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .card {
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
            background-color: rgba(255, 255, 255, 0.95);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: scale(1.06);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.35);
        }
        .btn-primary {
            background-color: #ff6f00;
            border-color: #ff6f00;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #e65100;
            transform: scale(1.12);
        }
        .fruit-icon {
            font-size: 40px;
            margin: 8px;
            color: #ffd600;
            animation: bounce 1.5s infinite;
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-12px);
            }
        }
        .fade-in {
            animation: fadeIn 1s ease forwards;
            opacity: 0;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container fade-in">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center animate__animated animate__fadeInDown">
                    <div class="card-body">
                        <h1 class="card-title" style="color: #ff6f00;">Selamat Datang di Halaman Admin</h1>
                        <p class="card-text">
                            <i class="fas fa-apple-alt fruit-icon"></i>
                            <i class="fas fa-lemon fruit-icon"></i>
                            <i class="fas fa-watermelon fruit-icon"></i>
                            <i class="fas fa-grapes fruit-icon"></i>
                            <i class="fas fa-orange fruit-icon"></i>
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
