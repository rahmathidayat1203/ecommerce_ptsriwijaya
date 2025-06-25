<!DOCTYPE html>
<html lang="en">

<head>
    <title>PT. Sriwijaya Mega Wisata</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('booksaw/css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('booksaw/icomoon/icomoon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('booksaw/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('booksaw/style.css') }}">
    <script src="https://www.youtube.com/iframe_api"></script>
    @laravelPWA

    <style>
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

        /* Container positioning */
        #haji-slider .col-md-12 {
            position: relative;
            padding: 0 60px;
        }

        /* Navigation buttons */
        .slick-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: #ff7043;
            border: none;
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
            z-index: 10;
        }

        .slick-arrow:hover {
            background: #ff5722;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        /* Slider items */
        .slider-item {
            display: flex;
            align-items: center;
            gap: 30px;
            /* background: #fff; */
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.5s ease;
        }

        /* Banner content */
        .banner-content {
            flex: 1;
        }

        .banner-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #ff5722;
        }

        .service_list {
            list-style: none;
            padding: 0;
            margin: 0 0 25px 0;
            font-size: 1.1rem;
            line-height: 1.6;
            color: #444;
        }

        .service_list li {
            position: relative;
            padding-left: 30px;
            margin-bottom: 12px;
            cursor: default;
            transition: color 0.3s ease;
        }

        .service_list li i {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: #ff7043;
            font-size: 1.3rem;
        }

        .service_list li:hover {
            color: #ff5722;
            font-weight: 600;
        }

        /* Button styles */
        .btn-wrap {
            margin-top: 10px;
        }

        .btn-outline-accent {
            display: inline-flex;
            align-items: center;
            padding: 10px 22px;
            border: 2px solid #ff5722;
            color: #ff5722;
            font-weight: 600;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-outline-accent:hover {
            background-color: #ff5722;
            color: white;
        }

        .btn-outline-accent i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .btn-outline-accent:hover i {
            transform: translateX(5px);
        }

        /* Banner images */
        .banner-image {
            max-width: 450px;
            border-radius: 15px;
            object-fit: cover;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.5s ease;
        }

        .slider-item:hover .banner-image {
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .slider-item {
                flex-direction: column;
                text-align: center;
            }

            .banner-image {
                max-width: 100%;
                margin-top: 20px;
            }

            #haji-slider .col-md-12 {
                padding: 0 15px;
            }

            .slick-arrow {
                width: 40px;
                height: 40px;
            }
        }

        .main-slider {
            position: relative;
        }

        .slick-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            background: rgba(0, 0, 0, 0.5);
            border: none;
            padding: 10px;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .slick-arrow.prev {
            left: 0;
        }

        .slick-arrow.next {
            right: 0;
        }
    </style>

</head>


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

            <div class="col-md-2">
                <div class="main-logo">
                    <a href="index.html">
                        <img src="/booksaw/images/logo_pt.png" alt="logo" class="img-fluid"
                            style="max-height: 50px;">
                    </a>
                </div>
            </div>

            <div class="col-md-10 d-flex justify-content-between align-items-center">
                <nav id="navbar" class="d-flex align-items-center w-100">
                    <ul class="menu-list nav me-auto">
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

                    <!-- Tombol Logout -->
                    <form id="logout-form" action="{{ route('logout') }}" method="GET"
                        class="mb-0 ms-3 d-flex align-items-center">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm px-4">Logout</button>
                    </form>

                    <!-- Hamburger Menu untuk Mobile -->
                    <div class="hamburger d-md-none ms-3" role="button" tabindex="0" aria-label="Toggle menu">
                        <span class="bar"
                            style="display:block; width: 25px; height: 3px; background-color: #333; margin: 5px 0;"></span>
                        <span class="bar"
                            style="display:block; width: 25px; height: 3px; background-color: #333; margin: 5px 0;"></span>
                        <span class="bar"
                            style="display:block; width: 25px; height: 3px; background-color: #333; margin: 5px 0;"></span>
                    </div>
                </nav>
            </div>


        </div>
    </div>
</header>



@if (session('success'))
    <!-- Modal HTML -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script untuk otomatis show modal saat halaman load -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        });
    </script>
@endif


{{-- </div><!--header-wrap--> --}}

<section id="haji-slider">

    <div class="container" id="home">
        <div class="row">
            <div class="col-md-12 position-relative">

                <button class="prev slick-arrow" aria-label="Previous Slide">
                    <i class="icon icon-arrow-left"></i>
                </button>

                <div class="main-slider pattern-overlay">

                    <div class="slider-item">
                        <div class="banner-content">
                            <h2 class="banner-title">Haji Khusus</h2>
                            <ul class="service_list">
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Hotel Makkah *5 Swiss Al
                                    Maqom/Movenpick/Sofwah dhorar/Dhufron Safwah</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Hotel Madinah *5 Swiss Al
                                    Aqeeq/Dal Al Haram/Leader Muna Kareem/Frontel</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Hotel Transit *Menyesuaikan
                                    dari Masyair*</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Maktab 115.116</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Pesawat Saudi/Garuda/Emirates
                                    : Madinah/Jeddah</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Full Bimbingan dari sebelum
                                    keberangkatan selama perjalanan hingga kepulangan</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More <i
                                        class="icon icon-ns-arrow-right"></i></a>
                            </div>
                        </div>
                        <img src="/booksaw/images/brosur1.jpg" alt="Haji Khusus Banner" class="banner-image">
                    </div>

                    <div class="slider-item">
                        <div class="banner-content">
                            <h2 class="banner-title">Haji Furoda</h2>
                            <ul class="service_list">
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Tiket PLM-JKT-PLM (PP)</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Tiket JKT-JED-JKT /
                                    SV-WY-QR-dll</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Pembimbing Ibadah & Manasik
                                </li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Hotel *5 & Maktab</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Perlengkapan</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Asuransi</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Bus Selama Program</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Ziaroh Mekkah & Madinah</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Meals Fullboard</li>
                                <li><i class="bx bxs-check-circle-service_list-icon"></i>Handling In Out</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="#" class="btn btn-outline-accent btn-accent-arrow">Read More <i
                                        class="icon icon-ns-arrow-right"></i></a>
                            </div>
                        </div>
                        <img src="/booksaw/images/brosur2.jpg" alt="Haji Furoda Banner" class="banner-image">
                    </div>

                </div>

                <button class="next slick-arrow" aria-label="Next Slide">
                    <i class="icon icon-arrow-right"></i>
                </button>

            </div>
        </div>
    </div>

    <section id="Podcast" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
                        <div class="title">
                            <span>Podcast PT Sriwijaya Mega Wisata</span>
                        </div>
                        <h2 class="section-title">Podcast PT Sriwijaya Mega Wisata</h2>
                    </div>

                    <div class="product-list" data-aos="fade-up">
                        <div class="row">

                            <div class="col-md-4">
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


                            <div class="col-md-4">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <div class="video-container">
                                            <div id="player2"></div>
                                        </div>
                                    </figure>
                                    <figcaption>
                                        <h3> Review Keberangkatan Umroh 26 September Bersama Buya RM Henri </h3>

                                    </figcaption>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="product-item">
                                    <figure class="product-style">
                                        <div class="video-container">
                                            <div id="player3"></div>
                                        </div>
                                    </figure>
                                    <figcaption>
                                        <h3> Bersama Direktur Keuangan Mega Wisata Promo Umroh Ber-empat 100 Jt</h3>
                                    </figcaption>
                                </div>
                            </div>
                        </div><!--ft-books-slider-->
                    </div><!--grid-->


                </div><!--inner-content-->
            </div>
        </div>
    </section>

    <section id="Produk" class="bookshelf py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center">
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
                                    <div class="col-md-3 mb-4">
                                        <div class="product-item card border-0 shadow-sm h-100">
                                            <figure class="product-style m-0">
                
                                                <img src="{{ asset($product->foto) }}" alt="Produk"
                                                    class="card-img-top" style="height: 250px; object-fit: cover;">
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


                    <!-- Modal Order -->
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

                    <!-- Modal Komentar -->
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

                    <!-- Script untuk Isi Modal -->
                    <script>
                        const orderModal = document.getElementById('orderModal');
                        orderModal.addEventListener('show.bs.modal', function(event) {
                            const button = event.relatedTarget;
                            document.getElementById('modalProductId').value = button.getAttribute('data-id');
                            document.getElementById('modalProductName').innerText = button.getAttribute('data-nama');
                            document.getElementById('modalProductPrice').innerText = new Intl.NumberFormat('id-ID').format(button
                                .getAttribute('data-harga'));
                        });

                        const commentModal = document.getElementById('commentModal');
                        commentModal.addEventListener('show.bs.modal', function(event) {
                            const button = event.relatedTarget;
                            document.getElementById('reviewProductId').value = button.getAttribute('data-produk');
                            document.getElementById('reviewProductName').value = button.getAttribute('data-nama');
                        });
                    </script>
                </div>
            </div>
        </div>
    </section>


    <section id="Review" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header align-center text-center mb-4">
                        <div class="title">
                            <span>Review PT Sriwijaya Mega Wisata</span>
                        </div>
                        <h2 class="section-title">Review Jamaah</h2>
                    </div>

                    <div class="review-section">
                        <h4 class="mb-3">
                            Ulasan
                            <span class="badge bg-success">{{ count($filtered) }}</span>
                        </h4>

                        @if (count($filtered) > 0)
                            <div class="row row-cols-1 g-3">
                                @foreach ($filtered as $item)
                                    <div class="col">
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
                            <div class="alert alert-info mt-3">
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
                <div class="col-md-6">
                    <div class="footer-item mb-4">
                        <div class="company-brand d-flex flex-column align-items-center">
                            <img src="/booksaw/images/Logo PT.png" alt="logo" class="footer-logo mb-3"
                                style="max-width: 150px;">
                            <p class="mb-3 fs-5">
                                Menjadi biro perjalanan yang mampu memberikan solusi dan nilai lebih suatu
                                perjalanan.<br>
                                <em>Insya Allah Haji, Umrah, dan Tour Anda bersama kami akan terasa <strong>"Aman,
                                        Nyaman,
                                        dan Berkesan"</strong>.</em>
                            </p>

                            <!-- Alamat Perusahaan -->
                            <div class="company-address text-secondary fs-6">
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
        const orderModal = document.getElementById('orderModal');
        orderModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const productId = button.getAttribute('data-id');
            const productName = button.getAttribute('data-nama');
            const productPrice = button.getAttribute('data-harga');
            // Isi data ke modal
            document.getElementById('modalProductName').textContent = productName;
            document.getElementById('modalProductPrice').textContent = productPrice;
            document.getElementById('modalProductId').value = productId;
            document.getElementById('modalQuantity').value = 1;
        });
    </script>
    <script src="{{ asset('booksaw/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="{{ asset('booksaw/js/plugins.js') }}"></script>
    <script src="{{ asset('booksaw/js/script.js') }}"></script>

    <script>
        let player, player2, player3;

        function onYouTubeIframeAPIReady() {
            const timestamp = Date.now(); // Untuk mencegah cache

            player = new YT.Player('player1', {
                height: '390',
                width: '640',
                videoId: 'YOatSdahv9o', // Video ID
                playerVars: {
                    autoplay: 0,
                    controls: 1,
                    origin: window.location.origin,
                    nocache: timestamp // Trik tambahan (walau tidak resmi)
                },
                events: {
                    'onReady': onPlayerReady
                }
            });

            player2 = new YT.Player('player2', {
                height: '390',
                width: '640',
                videoId: 'OiUYnO7KlhM',
                playerVars: {
                    autoplay: 0,
                    controls: 1,
                    origin: window.location.origin,
                    nocache: timestamp
                },
                events: {
                    'onReady': onPlayerReady
                }
            });

            player3 = new YT.Player('player3', {
                height: '390',
                width: '640',
                videoId: 'm5z9KjZ6NBY',
                playerVars: {
                    autoplay: 0,
                    controls: 1,
                    origin: window.location.origin,
                    nocache: timestamp
                },
                events: {
                    'onReady': onPlayerReady
                }
            });
        }

        function onPlayerReady(event) {
            // Uncomment jika ingin autoplay saat siap
            // event.target.playVideo();
        }
    </script>

    </body>

</html>
