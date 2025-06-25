<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Haji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Formulir Pendaftaran Haji</h4>
            </div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


            <div class="card-body">
                <!-- Tempat munculnya error jika ada -->
                <div class="alert alert-danger d-none" id="form-errors">
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0" id="error-list">
                        <!-- Pesan error akan muncul di sini -->
                    </ul>
                </div>

                <form action="{{ route('submit.form') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nomor Ktp</label>
                            <input type="text" name="nomor_ktp" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nama Ayah</label>
                            <input type="text" name="nama_ayah" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Alamat Lengkap</label>
                            <input type="text" name="alamat_lengkap" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Kabupaten Kota</label>
                            <input type="text" name="kabupaten_kota" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>No Telp</label>
                            <input type="number" name="no_telepon" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Pria">Laki-laki</option>
                                <option value="Wanita">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Kewarganegaraan</label>
                            <input type="text" name="kewarganegaraan" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Desa/Kelurahan</label>
                            <input type="text" name="desa_kelurahan" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Kode Pos</label>
                            <input type="text" name="kode_pos" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Pergi Haji</label>
                            <select name="pergi_haji" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Pertama">Pertama</option>
                                <option value="Berulang">Berulang</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nama Mahram</label>
                            <input type="text" name="nama_mahram" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>No Pendaftaran Mahram</label>
                            <input type="text" name="no_pendaftaran_mahram" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Golongan Darah</label>
                            <select name="golongan_darah" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status Jamaah</label>
                            <select name="status_jamaah" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Biasa">Reguler</option>
                                <option value="Khusus">Khusus</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Status Perkawinan</label>
                            <select name="status_perkawinan" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Janda/Duda">Duda/Janda</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Kode Diagnosis</label>
                            <input type="text" name="kode_diagnosis" class="form-control" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Ciri-Ciri</label>
                            <textarea name="ciri_ciri" class="form-control" rows="3" required></textarea>
                        </div>
                        <!-- Tombol Daftar dan Kembali -->
                        <div class="col-12 d-flex justify-content-between">
                            <a href="{{ url('/landing') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                            </a>
                            <button type="submit" class="btn btn-success">Daftar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS + form validasi sederhana -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('hajiForm').addEventListener('submit', function(e) {
            e.preventDefault();
            let errors = [];
            const requiredFields = this.querySelectorAll('[required]');

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    const label = field.closest('.mb-3').querySelector('label').innerText;
                    errors.push(label + ' wajib diisi.');
                }
            });

            const errorDiv = document.getElementById('form-errors');
            const errorList = document.getElementById('error-list');
            errorList.innerHTML = '';

            if (errors.length > 0) {
                errors.forEach(err => {
                    const li = document.createElement('li');
                    li.textContent = err;
                    errorList.appendChild(li);
                });
                errorDiv.classList.remove('d-none');
            } else {
                errorDiv.classList.add('d-none');
                alert('Form berhasil dikirim!');
                this.reset();
            }
        });
    </script>
</body>

</html>
