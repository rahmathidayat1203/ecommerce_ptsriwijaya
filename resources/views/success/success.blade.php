<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #e0f7fa, #ffffff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .success-card {
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            padding: 40px 30px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            animation: fadeInUp 0.6s ease-out both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .checkmark-circle {
            width: 80px;
            height: 80px;
            margin: 0 auto 20px;
        }

        .checkmark-circle svg {
            width: 100%;
            height: 100%;
        }

        h2 {
            font-weight: 600;
            color: #28a745;
        }

        p.lead {
            color: #555;
            margin-bottom: 30px;
        }

        .btn-primary {
            padding: 10px 24px;
            font-weight: 500;
            border-radius: 30px;
        }
    </style>
</head>

<body>

    <div class="success-card">
        <div class="checkmark-circle">
            <svg viewBox="0 0 52 52">
                <circle cx="26" cy="26" r="25" fill="none" stroke="#28a745" stroke-width="3" />
                <path fill="none" stroke="#28a745" stroke-width="4" d="M14 27l8 8 16-16" />
            </svg>
        </div>
        <h2>Pembayaran Berhasil!</h2>
        <p class="lead">Terima kasih telah melakukan pembayaran. Pesanan Anda sedang diproses.</p>
        <a href="{{ route('landing_page') }}" class="btn btn-primary">Kembali ke Keranjang</a>

    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
