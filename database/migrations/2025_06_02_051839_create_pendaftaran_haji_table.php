<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaranHajiTable extends Migration
{
    public function up()
    {
        Schema::create('pendaftaran_haji', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_ktp');
            $table->string('nama_lengkap');
            $table->string('nama_ayah');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita']);
            $table->enum('kewarganegaraan', ['Indonesia', 'Asing']);
            $table->string('alamat_lengkap');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten_kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('no_telepon');
            $table->enum('pendidikan', ['SD', 'SLTP', 'SLTA', 'D1/D2/D3/SM', 'S1', 'S2', 'S3']);
            $table->enum('pekerjaan', ['PNS', 'TNI/POLRI', 'Dagang', 'Tani/Nelayan', 'Swasta', 'IRT', 'Pelajar/Mahasiswa', 'BUMN/BUMD', 'Pensiunan']);
            $table->enum('pergi_haji', ['Pertama', 'Berulang']);
            $table->string('nama_mahram');
            $table->enum('hubungan_mahram', ['Orang Tua', 'Anak', 'Suami/Istri', 'Mertua', 'Saudara Kandung']);
            $table->string('no_pendaftaran_mahram');
            $table->enum('golongan_darah', ['A', 'B', 'AB', 'O']);
            $table->enum('status_jamaah', ['Biasa', 'Khusus']);
            $table->enum('status_perkawinan', ['Belum Menikah', 'Menikah', 'Janda/Duda']);
            $table->char('kode_diagnosis');
            $table->enum('ciri_ciri', ['Rambut', 'Alis', 'Hidung', 'Muka', 'Tinggi', 'berat']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pendaftaran_haji');
    }
}
