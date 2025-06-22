@extends('layouts.layouts')

@section('content')
    <div class="container-fluid py-4">
        <!-- Row Statistik -->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Produk</p>
                                    <h5 class="font-weight-bolder">{{ $produk }}</h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Total Order</p>
                                    <h5 class="font-weight-bolder">{{ $order }}</h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tambahkan lebih banyak kolom statistik di sini jika perlu -->
        </div>

        <!-- Row Grafik -->
        <div class="row mt-4">
            <div class="col-lg-8 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <h6 class="text-capitalize">Pendaftaran Haji per Bulan</h6>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="grafik" class="chart-canvas" height="300" aria-label="Grafik Pendaftaran Haji"
                                role="img"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Anda bisa menambahkan kolom lain di samping grafik di sini -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer pt-4">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-6 mb-lg-0 mb-3 text-center text-lg-start">

                </div>
            </div>
        </div>
    </footer>

    <script>
        const labels = @json($labels);
        const data = @json($data);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('grafik').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Pendaftar',
                    data: data,
                    backgroundColor: 'rgba(94, 114, 228, 0.2)',
                    borderColor: '#5e72e4',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#5e72e4',
                    pointRadius: 5
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
@endsection
