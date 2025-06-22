<!DOCTYPE html>
<html lang="en">

<head>
    <title>PT. Sriwijaya Mega Wisata</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome (for icon panah) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('booksaw/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('booksaw/icomoon/icomoon.css') }}" />
    <link rel="stylesheet" href="{{ asset('booksaw/css/vendor.css') }}" />
    <link rel="stylesheet" href="{{ asset('booksaw/style.css') }}" />

    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
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
    </style>
</head>

<body>

    <header id="header" class="mb-4">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-2">
                    <div class="main-logo">
                        <a href="{{ url('/') }}"><img src="/booksaw/images/logo PT.png" alt="logo"
                                class="img-fluid" /></a>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="hamburger">
                        <span class="bar"></span><span class="bar"></span><span class="bar"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('landing-page') }}" class="btn btn-outline-secondary">
                <i class="fa fa-arrow-left me-1"></i> Kembali
            </a>
            <h2 class="mb-0 text-center flex-grow-1">Daftar Order</h2>
            <div style="width: 100px;"></div> <!-- Spacer untuk keseimbangan layout -->
        </div>


        {{-- Tampilkan error jika ada --}}
        @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('order.checkout') }}" method="POST">
            @csrf

            <div class="row">
                @forelse ($orders as $order)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="selected_orders[]"
                                        value="{{ $order->id }}" id="orderCheck{{ $order->id }}" />
                                    <label class="form-check-label" for="orderCheck{{ $order->id }}">
                                        Pilih Order
                                    </label>
                                </div>
                                <h5 class="card-title">Order #{{ $order->id }}</h5>
                                <p class="card-text mb-1"><strong>Produk:</strong>
                                    {{ $order->produk->nama_produk ?? '-' }}</p>

                                @php
                                    $hargaSetelahDiskon = isset($order->produk->harga, $order->produk->diskon)
                                        ? intval($order->produk->harga) -
                                            (intval($order->produk->harga) * intval($order->produk->diskon)) / 100
                                        : 0;
                                    $total_harga = $hargaSetelahDiskon * $order->total_pembelian;
                                @endphp

                                <p class="card-text mb-1"><strong>Harga:</strong>
                                    Rp {{ number_format($total_harga, 0, ',', '.') }}</p>

                                <p class="card-text mb-1"><strong>Status:</strong>
                                    <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span>
                                </p>
                                <p class="card-text mb-1"><strong>Tanggal:</strong>
                                    {{ \Carbon\Carbon::parse($order->tanggal_pembelian)->format('d M Y, H:i') }}
                                </p>
                                <p class="card-text small text-muted mt-auto">Created at: {{ $order->created_at }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">Belum ada order untuk ditampilkan.</div>
                    </div>
                @endforelse
            </div>

            @if ($orders->count())
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success px-4">Bayar yang Dipilih</button>
                </div>
            @endif

        </form>

    </main>

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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('booksaw/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('booksaw/js/plugins.js') }}"></script>
    <script src="{{ asset('booksaw/js/script.js') }}"></script>

</body>

</html>
