<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Confirmation</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <style>
        /* Menggunakan CSS dari halaman Anda sebelumnya tanpa perubahan besar */
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4bb543;
        }

        body {
            background-color: #f5f7fa;
            font-family: "Poppins", sans-serif;
            color: var(--dark-color);
        }

        .payment-container {
            max-width: 600px;
            margin: 2rem auto;
            animation: fadeIn 0.5s ease-in-out;
        }

        .payment-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .payment-header {
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        .payment-body {
            padding: 2rem;
            background-color: white;
        }

        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }

        .form-control {
            height: 50px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            padding: 0.75rem 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }

        .file-upload {
            position: relative;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .file-upload-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload-label {
            display: block;
            padding: 1.5rem;
            border: 2px dashed #e0e0e0;
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .file-upload-label:hover {
            border-color: var(--primary-color);
        }

        .file-upload-label i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .file-name {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #666;
        }

        .submit-btn {
            background-color: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 0.75rem;
            font-size: 1rem;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        .amount-input {
            position: relative;
        }

        .amount-input span {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            font-weight: 500;
            color: var(--dark-color);
        }

        .amount-input .form-control {
            padding-left: 3rem;
        }

        .info-text {
            font-size: 0.875rem;
            color: #666;
            margin-top: 0.5rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="container payment-container">
        <div class="payment-card">
            <div class="payment-header">
                <h4><i class="fas fa-credit-card me-2"></i>Konfirmasi Pembayaran</h4>
            </div>



            <div class="payment-body">
                <!-- form dimulai di sini -->

                <div class="payment-body">
                    <form action="{{ route('simpan_pembayaran') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Order ID --}}
                        <input type="hidden" name="id_order" value="{{ $orderIds[0] }}">

                        {{-- Jumlah Pembayaran --}}
                        <div class="mb-4">
                            <label for="jumlah_pembayaran" class="form-label">Jumlah Pembayaran</label>
                            <div class="amount-input">
                                <span>Rp</span>
                                <input type="number" class="form-control" id="jumlah_pembayaran"
                                    name="jumlah_pembayaran" value="{{ $total }}" readonly required>
                            </div>
                            <p class="info-text">Total tagihan: Rp{{ number_format($total, 0, ',', '.') }}</p>
                        </div>

                        <div class="mb-4">
                            <label for="metode_pembayaran" class="form-label">Nomor Rekening</label>
                            <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" required>
                                <option value="">-- Pilih Nomor Rekening --</option>
                                <option value="BCA">BCA - 8555.086.888</option>
                                <option value="DANA">BSI - 731.7000.884</option>
                                <option value="BRI">Bank Mega - 100.0276.458 </option>
                            </select>
                        </div>



                        {{-- Bukti Pembayaran --}}
                        <div class="mb-4">
                            <label class="form-label">Bukti Pembayaran</label>
                            <div class="file-upload">
                                <input type="file" class="file-upload-input" id="bukti_pembayaran"
                                    name="bukti_pembayaran" accept="image/*,.pdf" required>
                                <label for="bukti_pembayaran" class="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <div>Unggah Bukti Pembayaran</div>
                                    <div class="file-name">Format: JPG, PNG, atau PDF (max. 5MB)</div>
                                </label>
                            </div>
                            <p class="info-text">Pastikan bukti pembayaran jelas terbaca</p>
                        </div>

                        {{-- Submit --}}
                        <div class="d-grid">
                            <button type="submit" class="btn submit-btn">
                                <i class="fas fa-paper-plane me-2"></i>Kirim Konfirmasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Show selected file name
            document.querySelector('.file-upload-input').addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name || 'Tidak ada file dipilih';
                document.querySelector('.file-name').textContent = fileName;
            });
        </script>
</body>

</html>
