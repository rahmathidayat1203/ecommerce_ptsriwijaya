<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pendaftaran Haji</title>
    <style>
        @page {
            margin: 70px 25px 40px 25px;
            size: A4 portrait;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            font-size: 12px;
            line-height: 1.4;
        }

        /* Header Styles */
        .header {
            position: fixed;
            top: -60px;
            left: 0;
            right: 0;
            height: 60px;
            background-color: #fff;
            border-bottom: 3px solid #2c3e50;
            padding: 10px 0;
            padding-left: 100px;
            /* Lebih kecil agar judul bisa ke tengah */
            text-align: center;
            z-index: 1000;
        }

        .header h1 {
            color: #2c3e50;
            margin: 0;
            padding: 0;
            font-size: 20px;
            font-weight: bold;
        }

        .header .subtitle {
            color: #7f8c8d;
            font-size: 14px;
            margin-top: 5px;
        }

        .header-logo {
            position: absolute;
            top: 10px;
            left: 25px;
            height: 30px;
        }

        /* Footer Styles */
        .footer {
            position: fixed;
            bottom: -30px;
            left: 0;
            right: 0;
            height: 30px;
            background-color: #fff;
            border-top: 1px solid #ddd;
            text-align: center;
            padding-top: 5px;
            font-size: 10px;
            color: #666;
        }

        .content {
            padding-top: 20px;
        }

        .info-bar {
            background-color: #f8f9fa;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            border: 1px solid #e0e0e0;
        }

        .info-bar strong {
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 11px;
            page-break-inside: auto;
        }

        th {
            background-color: #2c3e50;
            color: white;
            padding: 8px 10px;
            text-align: left;
            font-weight: bold;
            position: sticky;
            top: 60px;
            z-index: 100;
        }

        td {
            padding: 6px 10px;
            border-bottom: 1px solid #e0e0e0;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .status-pending {
            color: #e67e22;
            font-weight: bold;
        }

        .status-approved {
            color: #27ae60;
            font-weight: bold;
        }

        .status-rejected {
            color: #e74c3c;
            font-weight: bold;
        }

        .page-number:before {
            content: "Halaman " counter(page);
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .page-break {
            page-break-after: always;
        }

        .watermark {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            opacity: 0.1;
            font-size: 80px;
            color: #999;
            pointer-events: none;
            z-index: -1;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <img src="{{ public_path('booksaw/images/logo_pt.png') }}" class="header-logo" alt="Logo">
        <h1>DAFTAR PENDAFTARAN HAJI</h1>
        <div class="subtitle">PT. Sriwijaya Mega Wisata - Tahun {{ date('Y') }}</div>
    </div>

    <!-- Watermark -->
    <div class="watermark">DOKUMEN RESMI</div>

    <!-- Content -->
    <div class="content">
        <div class="info-bar">
            <div>
                <span>Total Pendaftar: <strong>{{ $data->count() }}</strong></span> |
                <span>Laki-laki: <strong>{{ $data->where('jenis_kelamin', 'Pria')->count() }}</strong></span> |
                <span>Perempuan: <strong>{{ $data->where('jenis_kelamin', 'Wanita')->count() }}</strong></span>
            </div>
            <div>
                <span>Tanggal Cetak: <strong>{{ now()->translatedFormat('d F Y H:i') }}</strong></span> |
                <span>Operator: <strong>{{ Auth::user()->name ?? 'System' }}</strong></span>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th width="30">No</th>
                    <th width="150">Nama Lengkap</th>
                    <th width="100">No. KTP</th>
                    <th width="100">Tempat/Tgl Lahir</th>
                    <th width="120">Alamat</th>
                    <th width="100">Kabupaten/Kota</th>
                    <th width="80">Status</th>
                    <th width="60">Haji Ke</th>
                    <th width="80">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->nomor_ktp }}</td>
                        <td>
                            {{ $item->tempat_lahir }}<br>
                            {{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}<br>
                            ({{ \Carbon\Carbon::parse($item->tanggal_lahir)->age }} tahun)
                        </td>
                        <td>
                            {{ $item->alamat_ktp }}<br>
                            {{ $item->desa_kelurahan }}, {{ $item->kecamatan }}
                        </td>
                        <td>{{ $item->kabupaten_kota }}</td>
                        <td class="text-center">
                            @if ($item->status_jamaah == 'Disetujui')
                                <span class="status-approved">{{ $item->status_jamaah }}</span>
                            @elseif($item->status_jamaah == 'Ditolak')
                                <span class="status-rejected">{{ $item->status_jamaah }}</span>
                            @else
                                <span class="status-pending">{{ $item->status_jamaah ?? 'Pending' }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($item->pergi_haji == 'Pernah')
                                {{ $item->jumlah_haji ?? '1' }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="text-center">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Summary Section -->
        <div style="margin-top: 20px; font-size: 11px;">
            <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                <div style="width: 50%;">
                    <strong>Catatan:</strong><br>
                    - Dokumen ini dicetak secara otomatis oleh sistem<br>
                    - Tidak memerlukan tanda tangan basah
                </div>
                <div style="width: 45%; text-align: right;">
                    <div style="margin-top: 30px;">
                        <div style="margin-bottom: 40px;">Mengetahui,</div>
                        <div style="border-top: 1px solid #333; width: 200px; display: inline-block; padding-top: 5px;">
                            Kepala Kantor Kemenag<br>
                            {{ $kabupaten_kota ?? 'Kab/Kota' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <span class="page-number"></span> |
        Dicetak oleh: {{ Auth::user()->name ?? 'System' }} |
        {{ now()->translatedFormat('d F Y H:i:s') }}
    </div>
</body>

</html>
