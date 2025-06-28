@php
    use Carbon\Carbon;
    $umur = Carbon::parse($data->tanggal_lahir)->age;
@endphp

<!DOCTYPE html>
<html>

<head>
    <title>Surat Pendaftaran Pergi Haji (SPPH)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 3px;
            vertical-align: top;
        }

        .box {
            display: inline-block;
            width: 15px;
            height: 15px;
            border: 1px solid #000;
            margin-right: 2px;
        }

        .underline {
            border-bottom: 1px solid #000;
            display: inline-block;
            width: 200px;
        }

        .foto-jamaah {
            width: 100px;
            height: 130px;
            border: 1px solid #000;
            object-fit: cover;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h3 style="text-align: center;">SURAT PENDAFTARAN PERGI HAJI (SPPH)</h3>

    <table>
        <tr>
            <td>1. Nomor KTP</td>
            <td>: {{ $data->nomor_ktp }}</td>
        </tr>
        <tr>
            <td>2. Nama Lengkap</td>
            <td>: {{ $data->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>3. Nama Ayah Kandung</td>
            <td>: {{ $data->nama_ayah }}</td>
        </tr>
        <tr>
            <td>4. Tempat dan Tanggal Lahir</td>
            <td>: {{ $data->tempat_lahir }}, {{ Carbon::parse($data->tanggal_lahir)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>5. Umur</td>
            <td>: {{ $umur }} Tahun</td>
        </tr>
        <tr>
            <td>6. Jenis Kelamin</td>
            <td>: {{ $data->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td>7. Kewarganegaraan</td>
            <td>: {{ $data->kewarganegaraan }}</td>
        </tr>
        <tr>
            <td>8. Alamat KTP</td>
            <td>: {{ $data->alamat_lengkap }}</td>
        </tr>
        <tr>
            <td>9. Desa/Kelurahan</td>
            <td>: {{ $data->desa_kelurahan }}</td>
        </tr>
        <tr>
            <td>10. Kecamatan</td>
            <td>: {{ $data->kecamatan }}</td>
        </tr>
        <tr>
            <td>11. Kabupaten/Kota</td>
            <td>: {{ $data->kabupaten_kota }}</td>
        </tr>
        <tr>
            <td>12. Provinsi</td>
            <td>: {{ $data->provinsi }}</td>
        </tr>
        <tr>
            <td>13. No. Telp/HP</td>
            <td>: {{ $data->no_telepon }}</td>
        </tr>
        <tr>
            <td>14. Pendidikan</td>
            <td>: {{ $data->pendidikan }}</td>
        </tr>
        <tr>
            <td>15. Pekerjaan</td>
            <td>: {{ $data->pekerjaan }}</td>
        </tr>
        <tr>
            <td>16. Pergi Haji</td>
            <td>: {{ $data->pergi_haji }}</td>
        </tr>
        <tr>
            <td>17. Nama Mahram</td>
            <td>: {{ $data->nama_mahram }}</td>
        </tr>
        <tr>
            <td>18. Hubungan Mahram</td>
            <td>: {{ $data->hubungan_mahram }}</td>
        </tr>
        <tr>
            <td>19. No Pendaftaran Mahram</td>
            <td>: {{ $data->no_pendaftaran_mahram }}</td>
        </tr>
        <tr>
            <td>20. Golongan Darah</td>
            <td>: {{ $data->golongan_darah }}</td>
        </tr>
        <tr>
            <td>21. Status Jemaah</td>
            <td>: {{ $data->status_jamaah }}</td>
        </tr>
        <tr>
            <td>22. Status Perkawinan</td>
            <td>: {{ $data->status_perkawinan }}</td>
        </tr>
        <tr>
            <td>23. Kode Diagnosis</td>
            <td>: <div class="box">{{ $data->kode_diagnosis }}</div>
            </td>
        </tr>
        <tr>
            <td>24. Ciri-ciri</td>
            <td>: {{ $data->ciri_ciri }}</td>
        </tr>
    </table>

    <table style="margin-top: 20px;">
        <tr>
            <td>
                @if ($data->foto)
                    <img src="{{ public_path('uploads/foto/' . $data->foto) }}" class="foto-jamaah">
                @else
                    <div class="foto-jamaah" style="text-align:center;line-height:130px;">3 x 4</div>
                @endif
            </td>
            <td style="text-align: right;">
                Palembang, {{ Carbon::parse($data->created_at)->translatedFormat('d F Y') }}<br><br><br><br>
                <span class="underline"></span><br>
                Calon Jamaah Haji
            </td>
        </tr>
    </table>

</body>

</html>
