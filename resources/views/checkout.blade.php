    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Checkout - PT. Sriwijaya Mega Wisata</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('booksaw/css/normalize.css') }}" />
        <link rel="stylesheet" href="{{ asset('booksaw/icomoon/icomoon.css') }}" />
        <link rel="stylesheet" href="{{ asset('booksaw/css/vendor.css') }}" />
        <link rel="stylesheet" href="{{ asset('booksaw/style.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    </head>

    <body>

        <!-- Header -->
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

        <div class="row align-items-center mb-5">
            <div class="col-md-4 text-start">
                <a href="{{ route('order.list') }}"
                    class="btn btn-outline-primary shadow-sm px-4 py-2 d-inline-flex align-items-center gap-2 animate__animated animate__fadeInLeft">
                    <i class="fa fa-arrow-left"></i>
                    <span>Kembali ke Daftar Order</span>
                </a>
            </div>
            <div class="col-md-4 text-center">
                <h2 class="fw-semibold animate__animated animate__fadeInDown">🧾 Konfirmasi Pembayaran</h2>
            </div>
            <div class="col-md-4"></div>
        </div>



        <!-- Main Content -->
        <main class="container py-4">

            @if (session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif

            <form action="{{ route('order.pay') }}" method="POST">
                @csrf

                <div class="row g-4">
                    @php $grandTotal = 0; @endphp

                    @foreach ($orders as $order)
                        @php $grandTotal += $order->harga_setelah_diskon * $order->total_pembelian; @endphp
                        <div class="col-md-6 col-lg-4">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-body d-flex flex-column">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="order_ids[]"
                                            value="{{ $order->id }}" id="order_{{ $order->id }}" checked>
                                        <label class="form-check-label" for="order_{{ $order->id }}">
                                            Pilih untuk bayar
                                        </label>
                                    </div>

                                    <h5 class="card-title">Order #{{ $order->id }}</h5>
                                    <p class="card-text mb-1">🛍️ Produk:
                                        <strong>{{ $order->produk->nama_produk }}</strong>
                                    </p>

                                    <?php
                                    $total_harga = $order->harga_setelah_diskon * $order->total_pembelian;
                                    ?>

                                    <p class="card-text mb-1">💸 Harga Setelah Diskon:
                                        <strong>Rp {{ number_format($total_harga, 0, ',', '.') }}</strong>
                                    </p>

                                    <p class="card-text mb-1">📅 Tanggal:
                                        {{ \Carbon\Carbon::parse($order->tanggal_pembelian)->format('d M Y, H:i') }}
                                    </p>

                                    <p class="card-text mt-auto">🔖 Status:
                                        <span
                                            class="badge bg-{{ $order->status == 'pending' ? 'warning' : 'success' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <?php
                
                ?>

                @if ($orders->count())
                    <div class="mt-5 p-4 bg-light rounded shadow-sm text-center">
                        <h5 class="mb-2">Total yang harus dibayar:</h5>
                        <h4 class="text-primary fw-bold">Rp{{ number_format($grandTotal, 0, ',', '.') }}</h4>

                        <button type="submit" class="btn btn-success mt-3 px-5 py-2">💳 Bayar Sekarang</button>
                    </div>
                @endif
            </form>
        </main>
        <<<footer id="footer" class="bg-dark text-white py-5">
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
                                    <em>Insya Allah Haji, Umrah, dan Tour Anda bersama kami akan terasa
                                        <strong>"Aman,
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


            <!-- Scripts -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
            <script src="{{ asset('booksaw/js/jquery-1.11.0.min.js') }}"></script>
            <script src="{{ asset('booksaw/js/plugins.js') }}"></script>
            <script src="{{ asset('booksaw/js/script.js') }}"></script>

    </body>

    </html>
