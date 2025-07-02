<!DOCTYPE html>
<html lang="en" manifest="/manifest.json">

<head>
    <title>PT. Sriwijaya Mega Wisata</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#ffffff">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!-- Web App Manifest -->
    <link rel="manifest" href="/manifest.json">
    <!-- Add to Home Screen Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/booksaw/images/logo_pt.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/booksaw/images/logo_pt.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/booksaw/images/logo_pt.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer>
    </script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!-- Slick Slider JS -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('booksaw/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('booksaw/icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('booksaw/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('booksaw/style.css') }}">
    <script src="https://www.youtube.com/iframe_api" defer></script>
    @laravelPWA

    <style>
        /* Existing styles remain the same, only adding PWA-specific adjustments if needed */
        body.offline {
            background-color: #f8f9fa;
            position: relative;
        }

        body.offline::after {
            content: "Offline Mode";
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: #dc3545;
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            font-size: 14px;
            z-index: 1000;
        }

        /* Rest of your existing CSS remains unchanged */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            max-width: 100%;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        #haji-slider {
            position: relative;
            padding: 40px 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
        }

        #haji-slider .col-12 {
            position: relative;
            padding: 0 clamp(10px, 2vw, 15px);
        }

        .slick-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #ff7043;
            border: none;
            color: white;
            width: clamp(30px, 3vw, 40px);
            height: clamp(30px, 3vw, 40px);
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease, transform 0.3s ease;
            z-index: 10;
            font-size: clamp(0.8rem, 1.5vw, 1rem);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .slick-arrow:hover {
            background: #ff5722;
            transform: translateY(-50%) scale(1.1);
        }

        .prev {
            left: clamp(10px, 1vw, 15px);
        }

        .next {
            right: clamp(10px, 1vw, 15px);
        }

        .main-slider {
            position: relative;
            overflow: hidden;
        }

        .slider-item {
            display: flex;
            align-items: center;
            gap: clamp(20px, 3vw, 30px);
            padding: clamp(20px, 3vw, 30px);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: #ffffff;
            max-height: 600px;
            overflow: hidden;
            transition: transform 0.5s ease, box-shadow 0.3s ease;
        }

        .slider-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .banner-content {
            flex: 1;
            padding: clamp(10px, 2vw, 20px);
            max-width: clamp(300px, 40vw, 500px);
        }

        /* PERBAIKAN KHUSUS UNTUK TEKS "Haji Khusus" */
        .banner-title {
            font-size: clamp(1.5rem, 3vw, 2.5rem);
            font-weight: 700;
            color: #ff5722;
            margin-bottom: clamp(10px, 2vw, 15px);
            line-height: 1.3;
            /* Menghapus pemecahan kata */
            word-break: normal;
            overflow-wrap: normal;
            /* Menjaga kata tetap utuh */
            white-space: nowrap;
        }

        .banner-title span {
            display: inline-block;
        }

        .service_list {
            list-style: none;
            padding: 0;
            margin: 0 0 clamp(15px, 2vw, 20px) 0;
            font-size: clamp(0.8rem, 1.5vw, 1.1rem);
            line-height: 1.6;
            color: #444;
            max-height: 300px;
            overflow-y: auto;
            padding-right: clamp(5px, 1vw, 10px);
        }

        .service_list::-webkit-scrollbar {
            width: 6px;
        }

        .service_list::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 10px;
        }

        .service_list li {
            position: relative;
            padding-left: clamp(20px, 2.5vw, 25px);
            margin-bottom: clamp(8px, 1vw, 10px);
            cursor: default;
            transition: color 0.3s ease;
        }

        .service_list li i {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: #ff7043;
            font-size: clamp(0.9rem, 1.5vw, 1.3rem);
        }

        .service_list li:hover {
            color: #ff5722;
            font-weight: 600;
        }

        .btn-wrap {
            margin-top: clamp(10px, 2vw, 15px);
        }

        .btn-outline-accent {
            display: inline-flex;
            align-items: center;
            padding: clamp(6px, 1.5vw, 10px) clamp(12px, 3vw, 22px);
            border: 2px solid #ff5722;
            color: #ff5722;
            font-weight: 600;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: clamp(0.7rem, 1.5vw, 1rem);
            background: transparent;
        }

        .btn-outline-accent:hover {
            background-color: #ff5722;
            color: white;
        }

        .btn-outline-accent i {
            margin-left: clamp(5px, 1vw, 8px);
            transition: transform 0.3s ease;
        }

        .btn-outline-accent:hover i {
            transform: translateX(5px);
        }

        .banner-image {
            flex: 1;
            max-width: clamp(300px, 30vw, 500px);
            height: auto;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s ease;
        }

        .slider-item:hover .banner-image {
            transform: scale(1.05);
        }

        .hamburger {
            display: none;
            cursor: pointer;
            background: transparent;
            border: none;
            padding: 5px;
        }

        .hamburger .bar {
            display: block;
            width: 25px;
            height: 3px;
            background-color: #333;
            margin: 5px 0;
            transition: all 0.3s ease;
        }

        /* Improved mobile menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -300px;
            width: 280px;
            height: 100vh;
            background: white;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: right 0.3s ease;
            padding-top: 60px;
            overflow-y: auto;
        }

        .mobile-menu.active {
            right: 0;
        }

        .mobile-menu .nav-item {
            padding: 12px 20px;
            border-bottom: 1px solid #eee;
        }

        .mobile-menu .nav-link {
            font-size: 1.1rem;
            color: #333;
        }

        .mobile-menu .nav-link:hover {
            color: #ff5722;
        }

        .mobile-menu-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .overlay.active {
            display: block;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .slider-item {
                flex-direction: column;
                text-align: center;
                padding: clamp(15px, 2vw, 20px);
                max-height: 100%;
            }

            .banner-content {
                max-width: 100%;
                padding: clamp(10px, 2vw, 15px);
            }

            .banner-image {
                max-width: 100%;
                max-height: 300px;
                margin-top: clamp(15px, 2vw, 20px);
            }

            .service_list {
                max-height: 200px;
                margin: 0 auto;
                max-width: 90%;
            }

            .slick-arrow {
                width: clamp(25px, 2.5vw, 35px);
                height: clamp(25px, 2.5vw, 35px);
                font-size: clamp(0.7rem, 1.2vw, 14px);
            }

            .prev {
                left: clamp(5px, 1vw, 10px);
            }

            .next {
                right: clamp(5px, 1vw, 10px);
            }

            .hamburger {
                display: block;
            }

            #navbar .menu-list {
                display: none;
            }

            .mobile-menu {
                display: block;
            }

            /* PERBAIKAN KHUSUS UNTUK TEKS "Haji Khusus" PADA MOBILE */
            .banner-title {
                white-space: normal;
                /* Mengizinkan wrap jika diperlukan */
                line-height: 1.4;
                font-size: clamp(1.4rem, 4vw, 1.8rem);
            }

            .banner-title span {
                display: inline;
            }
        }

        @media (max-width: 768px) {
            .banner-title {
                font-size: clamp(1.3rem, 4.5vw, 1.6rem);
            }

            .service_list {
                font-size: clamp(0.7rem, 1.5vw, 0.9rem);
                max-height: 180px;
            }

            .service_list li {
                padding-left: clamp(15px, 2vw, 20px);
            }

            .service_list li i {
                font-size: clamp(0.8rem, 1.5vw, 1.1rem);
            }

            .btn-outline-accent {
                padding: clamp(5px, 1.5vw, 8px) clamp(10px, 2.5vw, 18px);
                font-size: clamp(0.6rem, 1.5vw, 0.85rem);
            }

            .banner-image {
                max-height: 250px;
            }

            /* Podcast section */
            .product-item {
                margin-bottom: 30px;
            }

            /* Products section */
            .col-12.col-md-3 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            /* Footer */
            .footer-item {
                padding: 0 15px;
            }
        }

        /* PERUBAHAN UTAMA UNTUK TABLET (768px - 991px) */
        @media (min-width: 768px) and (max-width: 991px) {
            .slider-item {
                padding: 0;
                max-height: 400px;
                border-radius: 0;
                box-shadow: none;
                background: transparent;
                flex-direction: row;
                align-items: stretch;
            }

            .banner-content {
                display: none;
                /* Sembunyikan teks di tablet */
            }

            .banner-image {
                max-width: 100%;
                max-height: none;
                height: 400px;
                border-radius: 0;
                margin-top: 0;
                box-shadow: none;
                width: 100%;
                object-fit: cover;
            }

            /* Perbesar tombol navigasi di tablet */
            .slick-arrow {
                width: 50px;
                height: 50px;
                background: rgba(255, 112, 67, 0.8);
                z-index: 100;
                font-size: 1.2rem;
            }

            .prev {
                left: 20px;
            }

            .next {
                right: 20px;
            }

            /* Hilangkan titik navigasi di tablet */
            .slick-dots {
                display: none !important;
            }
        }

        /* PERUBAHAN UTAMA UNTUK MOBILE (di bawah 768px) */
        @media (max-width: 767px) {
            .slider-item {
                padding: 0;
                max-height: 300px;
                border-radius: 0;
                box-shadow: none;
                background: transparent;
                flex-direction: row;
                align-items: stretch;
            }

            .banner-content {
                display: none;
                /* Sembunyikan teks di mobile */
            }

            .banner-image {
                max-width: 100%;
                max-height: none;
                height: 300px;
                border-radius: 0;
                margin-top: 0;
                box-shadow: none;
                width: 100%;
                object-fit: cover;
            }

            /* Perbesar tombol navigasi di mobile */
            .slick-arrow {
                width: 40px;
                height: 40px;
                background: rgba(255, 112, 67, 0.8);
                z-index: 100;
            }

            .prev {
                left: 10px;
            }

            .next {
                right: 10px;
            }

            /* Hilangkan titik navigasi di mobile */
            .slick-dots {
                display: none !important;
            }

            .banner-title {
                font-size: clamp(1.2rem, 5vw, 1.4rem);
                margin-bottom: 8px;
            }

            .service_list {
                font-size: clamp(0.6rem, 1.5vw, 0.85rem);
                max-height: 150px;
            }

            .service_list li {
                padding-left: clamp(12px, 1.5vw, 15px);
            }

            .service_list li i {
                font-size: clamp(0.7rem, 1.2vw, 0.9rem);
            }

            .btn-outline-accent {
                padding: clamp(4px, 1vw, 6px) clamp(8px, 2vw, 14px);
                font-size: clamp(0.5rem, 1.2vw, 0.8rem);
            }
        }

        @media (max-width: 576px) {
            .slider-item {
                max-height: 250px;
            }

            .banner-image {
                height: 250px;
            }
        }

        @media (max-width: 400px) {
            .banner-image {
                height: 200px;
            }

            .banner-title {
                font-size: clamp(1.1rem, 5.5vw, 1.3rem);
            }

            .service_list li {
                font-size: 0.8rem;
            }

            .btn-outline-accent {
                padding: clamp(3px, 0.8vw, 5px) clamp(6px, 1.5vw, 10px);
                font-size: clamp(0.4rem, 1vw, 0.6rem);
            }

            /* Header adjustments */
            .main-logo img {
                max-height: 35px !important;
            }
        }

        @media (min-width: 1200px) {
            .banner-title {
                font-size: clamp(2.5rem, 3vw, 3rem);
            }

            .banner-image {
                max-width: clamp(400px, 30vw, 500px);
            }

            #haji-slider .col-12 {
                padding: 0 clamp(50px, 5vw, 80px);
            }
        }
    </style>
</head>

<body>
    <!-- Service Worker Registration -->
    <script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then((registration) => {
                        console.log('Service Worker registered with scope:', registration.scope);
                    }).catch((error) => {
                        console.log('Service Worker registration failed:', error);
                    });
            });
        }

        // Check offline status and update UI
        function updateOnlineStatus() {
            document.body.classList.toggle('offline', !navigator.onLine);
        }

        window.addEventListener('online', updateOnlineStatus);
        window.addEventListener('offline', updateOnlineStatus);
        updateOnlineStatus();
    </script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <header id="header" class="bg-light shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center py-2">
                <div class="col-6 col-md-2">
                    <div class="main-logo">
                        <a href="index.html">
                            <img src="/booksaw/images/logo_pt.png" alt="Logo PT Sriwijaya Mega Wisata" class="img-fluid"
                                style="max-height: clamp(40px, 5vw, 50px);" loading="lazy">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-10 d-flex justify-content-end align-items-center">
                    <nav id="navbar" class="d-flex align-items-center w-100">
                        <ul class="menu-list nav me-auto d-none d-lg-flex">
                            <li class="nav-item">
                                <a href="#home" class="nav-link active px-3">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="#Podcast" class="nav-link px-3">Podcast</a>
                            </li>
                            <li class="nav-item">
                                <a href="#Produk" class="nav-link px-3">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a href="#Review" class="nav-link px-3">Review</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('show.form') }}" class="nav-link px-3">Pendaftaran Haji</a>
                            </li>
                        </ul>
                        @if (Auth::check())
                            <form id="logout-form" action="{{ route('logout') }}" method="GET"
                                class="mb-0 ms-3 d-flex align-items-center">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm px-4"
                                    style="font-size: clamp(0.6rem, 1vw, 0.8rem); padding: clamp(2px, 0.5vw, 4px) clamp(8px, 1.5vw, 12px);"
                                    aria-label="Logout">Logout</button>
                            </form>
                        @endif
                        <button class="hamburger d-lg-none" id="mobileMenuToggle" aria-label="Toggle menu">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </button>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Menu -->
    <div class="overlay" id="overlay"></div>
    <div class="mobile-menu" id="mobileMenu">
        <button class="mobile-menu-close" id="mobileMenuClose">&times;</button>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#home" class="nav-link active">Home</a>
            </li>
            <li class="nav-item">
                <a href="#Podcast" class="nav-link">Podcast</a>
            </li>
            <li class="nav-item">
                <a href="#Produk" class="nav-link">Produk</a>
            </li>
            <li class="nav-item">
                <a href="#Review" class="nav-link">Review</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('show.form') }}" class="nav-link">Pendaftaran Haji</a>
            </li>
            @if (Auth::check())
                <li class="nav-item mt-3">
                    <form id="logout-form-mobile" action="{{ route('logout') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger w-100">Logout</button>
                    </form>
                </li>
            @endif
        </ul>
    </div>

    @if (session('success'))
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel"
                            style="font-size: clamp(0.8rem, 1.5vw, 1rem);">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="font-size: clamp(0.6rem, 1vw, 0.8rem);">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            style="font-size: clamp(0.5rem, 0.8vw, 0.7rem); padding: clamp(2px, 0.5vw, 5px) clamp(5px, 1vw, 10px);">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            });
        </script>
    @endif

    <section id="haji-slider">
        <div class="container" id="home">
            <div class="row">
                <div class="col-12 position-relative">
                    <button class="prev slick-arrow" aria-label="Previous Slide">
                        <i class="icon icon-arrow-left" aria-hidden="true"></i>
                    </button>
                    <div class="main-slider pattern-overlay">
                        <div class="slider-item">
                            <div class="banner-content">
                                <!-- PERBAIKAN UTAMA: Struktur baru untuk teks "Haji Khusus" -->
                                <h2 class="banner-title">
                                    <span>Haji</span> <span>Khusus</span>
                                </h2>
                                <ul class="service_list">
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Hotel Makkah *5 Swiss Al
                                        Maqom/Movenpick/Sofwah dhorar/Dhufron Safwah</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Hotel Madinah *5 Swiss Al
                                        Aqeeq/Dal Al Haram/Leader Muna Kareem/Frontel</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Hotel Transit
                                        *Menyesuaikan dari Masyair*</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Maktab 115.116</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Pesawat
                                        Saudi/Garuda/Emirates: Madinah/Jeddah</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Full Bimbingan dari
                                        sebelum keberangkatan hingga kepulangan</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More <i
                                            class="icon icon-ns-arrow-right"></i></a>
                                </div>
                            </div>
                            <img src="/booksaw/images/brosur1.jpg" alt="Haji Khusus Banner" class="banner-image"
                                loading="lazy">
                        </div>
                        <div class="slider-item">
                            <div class="banner-content">
                                <h2 class="banner-title">Haji Furoda</h2>
                                <ul class="service_list">
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Tiket PLM-JKT-PLM (PP)
                                    </li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Tiket JKT-JED-JKT /
                                        SV-WY-QR-dll</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Pembimbing Ibadah &
                                        Manasik</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Hotel *5 & Maktab</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Perlengkapan</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Asuransi</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Bus Selama Program</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Ziaroh Mekkah & Madinah
                                    </li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Meals Fullboard</li>
                                    <li><i class="bx bxs-check-circle-service_list-icon"></i>Handling In Out</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More <i
                                            class="icon icon-ns-arrow-right"></i></a>
                                </div>
                            </div>
                            <img src="/booksaw/images/brosur2.jpg" alt="Haji Furoda Banner" class="banner-image"
                                loading="lazy">
                        </div>
                    </div>
                    <button class="next slick-arrow" aria-label="Next Slide">
                        <i class="icon icon-arrow-right" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section id="Podcast" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header align-center text-center">
                        <div class="title">
                            <span>Podcast PT Sriwijaya Mega Wisata</span>
                        </div>
                        <h2 class="section-title">Podcast PT Sriwijaya Mega Wisata</h2>
                    </div>
                    <div class="product-list" data-aos="fade-up">
                        <div class="row">
                            <div class="col-12 col-md-4 mb-4">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <div class="video-container">
                                            <div id="player1"></div>
                                        </div>
                                    </figure>
                                    <figcaption>
                                        <h3>Review Tour Halal Paket Korea</h3>
                                    </figcaption>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-4">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <div class="video-container">
                                            <div id="player2"></div>
                                        </div>
                                    </figure>
                                    <figcaption>
                                        <h3>Review Keberangkatan Umroh 26 September Bersama Buya RM Henri</h3>
                                    </figcaption>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 mb-4">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <div class="video-container">
                                            <div id="player3"></div>
                                        </div>
                                    </figure>
                                    <figcaption>
                                        <h3>Bersama Direktur Keuangan Mega Wisata Promo Umroh Ber-empat 100 Jt</h3>
                                    </figcaption>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Produk" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header align-center text-center">
                        <div class="title">
                            <span>Produk PT Sriwijaya Mega Wisata</span>
                        </div>
                        <h2 class="section-title">Produk Yang Disediakan</h2>
                    </div>
                    <div class="tab-content">
                        <div id="all-genre" data-tab-content class="active">
                            <div class="row">
                                @foreach ($products as $product)
                                    @php
                                        $harga = intval(preg_replace('/[^\d]/', '', $product->harga));
                                        $diskonPersen = intval($product->diskon);
                                        $diskon = $harga * ($diskonPersen / 100);
                                        $hargaSetelahDiskon = $harga - $diskon;
                                    @endphp
                                    <div class="col-12 col-md-6 col-lg-3 mb-4">
                                        <div class="product-item card border-0 shadow-sm h-100">
                                            <figure class="product-style m-0">
                                                <img src="{{ asset($product->foto) }}"
                                                    alt="{{ $product->nama_produk }}" class="card-img-top"
                                                    style="aspect-ratio: 16 / 9; object-fit: cover;" loading="lazy">
                                                <figcaption class="p-3">
                                                    <h5 class="card-title">{{ $product->nama_produk }}</h5>
                                                    <p class="card-text text-muted">{{ $product->deskripsi }}</p>
                                                    <div class="item-price fw-bold text-primary">
                                                        Rp {{ number_format($hargaSetelahDiskon, 0, ',', '.') }}
                                                        @if ($diskonPersen > 0)
                                                            <div class="text-danger small">
                                                                <del>Rp {{ number_format($harga, 0, ',', '.') }}</del>
                                                                (Diskon {{ $diskonPersen }}%)
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="d-grid gap-2 mt-3">
                                                        <button type="button" class="btn btn-success btn-sm"
                                                            data-bs-toggle="modal" data-bs-target="#orderModal"
                                                            data-id="{{ $product->id }}"
                                                            data-nama="{{ $product->nama_produk }}"
                                                            data-harga="{{ $hargaSetelahDiskon }}">
                                                            Pesan Sekarang
                                                        </button>
                                                        <button type="button" class="btn btn-outline-primary btn-sm"
                                                            data-bs-toggle="modal" data-bs-target="#commentModal"
                                                            data-produk="{{ $product->id }}"
                                                            data-nama="{{ $product->nama_produk }}">
                                                            Beri Komentar
                                                        </button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form id="orderForm" method="POST" action="{{ route('cart.store') }}">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Pesan Produk</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama Produk:</strong> <span id="modalProductName"></span></p>
                                        <p><strong>Harga:</strong> Rp <span id="modalProductPrice"></span></p>
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">Jumlah Order</label>
                                            <input type="number" class="form-control" name="quantity"
                                                id="modalQuantity" min="1" value="1" required>
                                        </div>
                                        <input type="hidden" name="product_id" id="modalProductId">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Tambahkan ke Keranjang</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="{{ route('review.post') }}">
                                @csrf
                                <input type="hidden" name="id_produk" id="reviewProductId">
                                <input type="hidden" name="id_pembeli" value="{{ auth()->id() }}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Beri Komentar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Produk</label>
                                            <input type="text" class="form-control" id="reviewProductName"
                                                disabled>
                                        </div>
                                        <div class="mb-3">
                                            <label for="rating" class="form-label">Rating</label>
                                            <select class="form-select" name="rating" required>
                                                <option value="">Pilih Rating</option>
                                                <option value="1">1 - Sangat Buruk</option>
                                                <option value="2">2 - Buruk</option>
                                                <option value="3">3 - Cukup</option>
                                                <option value="4">4 - Baik</option>
                                                <option value="5">5 - Sangat Baik</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="komentar" class="form-label">Komentar</label>
                                            <textarea class="form-control" name="komentar" rows="3" placeholder="Tulis komentar Anda..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="Review" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header align-center text-center mb-4">
                        <div class="title">
                            <span>Review PT Sriwijaya Mega Wisata</span>
                        </div>
                        <h2 class="section-title">Review Jamaah</h2>
                    </div>
                    <div class="review-section">
                        <h4 class="mb-3 text-center">
                            Ulasan
                            <span class="badge bg-success">{{ count($filtered) }}</span>
                        </h4>
                        @if (count($filtered) > 0)
                            <div class="row row-cols-1 g-3">
                                @foreach ($filtered as $item)
                                    <div class="col-12">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between mb-2">
                                                    <small class="text-muted">
                                                        {{ $item['created_at']->format('d M Y') }}
                                                    </small>
                                                    <span class="badge bg-primary">Positif</span>
                                                </div>
                                                <p class="mb-0">{{ $item['komentar'] }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="alert alert-info mt-3 text-center">
                                Belum ada ulasan untuk ditampilkan.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer id="footer" class="bg-dark text-white py-5">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="footer-item mb-4">
                        <div class="company-brand d-flex flex-column align-items-center">
                            <img src="/booksaw/images/logo_pt.png" alt="Logo PT Sriwijaya Mega Wisata"
                                class="footer-logo mb-3"
                                style="max-width: clamp(100px, 15vw, 15vw); max-height: clamp(80px, 10vw, 100px);"
                                loading="lazy">
                            <p class="mb-3 fs-5" style="font-size: clamp(0.7rem, 1.2vw, 1rem);">
                                Menjadi biro perjalanan yang mampu memberikan solusi dan nilai lebih suatu
                                perjalanan.<br>
                                <em>Insya Allah Haji, Umrah, dan Tour Anda bersama kami akan terasa <strong>"Aman,
                                        Nyaman, dan Berkesan"</strong>.</em>
                            </p>
                            <div class="company-address text-secondary fs-6"
                                style="font-size: clamp(0.6rem, 1vw, 0.8rem);">
                                <strong>Sriwijaya Mega Wisata</strong><br>
                                Jl. Jendral Sudirman No. 75/09, 30126 - Palembang
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuClose = document.getElementById('mobileMenuClose');
        const overlay = document.getElementById('overlay');

        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        mobileMenuClose.addEventListener('click', closeMobileMenu);
        overlay.addEventListener('click', closeMobileMenu);

        // Close menu when clicking on links
        document.querySelectorAll('.mobile-menu .nav-link').forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });

        // Slick Slider Initialization
        $(document).ready(function() {
            $('.main-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '.prev',
                nextArrow: '.next',
                dots: true,
                autoplay: true,
                autoplaySpeed: 5000,
                fade: true,
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            arrows: true,
                            dots: false, // Sembunyikan dots di tablet
                            slidesToShow: 1
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            arrows: true,
                            dots: false, // Sembunyikan dots di mobile
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });

        // Modal Data Population
        const orderModal = document.getElementById('orderModal');
        orderModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            document.getElementById('modalProductId').value = button.getAttribute('data-id');
            document.getElementById('modalProductName').innerText = button.getAttribute('data-nama');
            document.getElementById('modalProductPrice').innerText = new Intl.NumberFormat('id-ID').format(button
                .getAttribute('data-harga'));
            document.getElementById('modalQuantity').value = 1;
        });

        const commentModal = document.getElementById('commentModal');
        commentModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            document.getElementById('reviewProductId').value = button.getAttribute('data-produk');
            document.getElementById('reviewProductName').value = button.getAttribute('data-nama');
        });

        // YouTube Player Initialization
        let player, player2, player3;

        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player1', {
                videoId: 'YOatSdahv9o',
                playerVars: {
                    autoplay: 0,
                    controls: 1,
                    origin: window.location.origin
                },
                events: {
                    'onReady': onPlayerReady
                }
            });
            player2 = new YT.Player('player2', {
                videoId: 'OiUYnO7KlhM',
                playerVars: {
                    autoplay: 0,
                    controls: 1,
                    origin: window.location.origin
                },
                events: {
                    'onReady': onPlayerReady
                }
            });
            player3 = new YT.Player('player3', {
                videoId: 'm5z9KjZ6NBY',
                playerVars: {
                    autoplay: 0,
                    controls: 1,
                    origin: window.location.origin
                },
                events: {
                    'onReady': onPlayerReady
                }
            });
        }

        function onPlayerReady(event) {
            // Optional: event.target.playVideo();
        }
    </script>
    <script src="{{ asset('booksaw/js/plugins.js') }}" defer></script>
    <script src="{{ asset('booksaw/js/script.js') }}" defer></script>
</body>

</html>
