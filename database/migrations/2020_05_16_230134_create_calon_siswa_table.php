<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalonSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calon_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_daftar')->unique();
            $table->unsignedBigInteger('id_jalur');
            $table->foreign('id_jalur')->references('id')->on('jalur')->onUpdate('cascade')->onDelete('restrict');

            $table->unsignedBigInteger('id_pilihan_jurusan_satu');
            $table->foreign('id_pilihan_jurusan_satu')->references('id')->on('jurusan')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_pilihan_jurusan_dua');
            $table->foreign('id_pilihan_jurusan_dua')->references('id')->on('jurusan')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_pilihan_jurusan_tiga');
            $table->foreign('id_pilihan_jurusan_tiga')->references('id')->on('jurusan')->onUpdate('cascade')->onDelete('restrict');

            $table->string('nisn')->unique();
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');

            $table->string('nik');
            $table->string('no_kartu_keluarga');
            $table->string('no_reg_akta_kelahiran');

            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('id_agama');
            $table->foreign('id_agama')->references('id')->on('agama')->onUpdate('cascade')->onDelete('restrict');

            // Data Alamat Calon Siswa
            $table->text('alamat');
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->string('dusun');
            $table->string('desa_kelurahan');
            $table->string('kecamatan');
            $table->string('kode_pos', 10);
            $table->string('kabupaten');

            $table->unsignedBigInteger('id_tempat_tinggal');
            $table->foreign('id_tempat_tinggal')->references('id')->on('tempat_tinggal')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_transportasi');
            $table->foreign('id_transportasi')->references('id')->on('transportasi')->onUpdate('cascade')->onDelete('restrict');

            $table->string('punya_kip');
            $table->string('no_kip')->nullable();

            // Data Ayah Kandung
            $table->string('nama_pada_kip')->nullable();
            $table->string('nama_ayah_kandung');
            $table->string('nik_ayah');
            $table->string('tahun_lahir_ayah', 4);
            $table->unsignedBigInteger('id_pendidikan_ayah');
            $table->foreign('id_pendidikan_ayah')->references('id')->on('pendidikan')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_pekerjaan_ayah');
            $table->foreign('id_pekerjaan_ayah')->references('id')->on('pekerjaan')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_penghasilan_ayah');
            $table->foreign('id_penghasilan_ayah')->references('id')->on('penghasilan')->onUpdate('cascade')->onDelete('restrict');

            // Data Ibu Kandung
            $table->string('nama_ibu_kandung');
            $table->string('nik_ibu');
            $table->string('tahun_lahir_ibu', 4);
            $table->unsignedBigInteger('id_pendidikan_ibu');
            $table->foreign('id_pendidikan_ibu')->references('id')->on('pendidikan')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_pekerjaan_ibu');
            $table->foreign('id_pekerjaan_ibu')->references('id')->on('pekerjaan')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_penghasilan_ibu');
            $table->foreign('id_penghasilan_ibu')->references('id')->on('penghasilan')->onUpdate('cascade')->onDelete('restrict');

            // Data Wali
            $table->string('nama_wali')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('tahun_lahir_wali', 4)->nullable();
            $table->unsignedBigInteger('id_pendidikan_wali')->nullable();
            $table->foreign('id_pendidikan_wali')->references('id')->on('pendidikan')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_pekerjaan_wali')->nullable();
            $table->foreign('id_pekerjaan_wali')->references('id')->on('pekerjaan')->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedBigInteger('id_penghasilan_wali')->nullable();
            $table->foreign('id_penghasilan_wali')->references('id')->on('penghasilan')->onUpdate('cascade')->onDelete('restrict');

            // Data Komunikasi
            $table->string('no_telepon_rumah', 30)->nullable();
            $table->string('no_telepon', 30)->nullable();
            $table->string('email')->nullable();

            // Data Fisik Calon Siswa
            $table->decimal('tinggi_badan');
            $table->decimal('berat_badan');
            $table->decimal('lingkar_kepala');


            $table->string('jarak_rumah_ke_sekolah');
            $table->string('waktu_tempuh');
            $table->integer('anak_ke');
            $table->integer('jumlah_saudara_kandung');

            // Data Prestasi Calon Siswa
            $table->string('jenis_prestasi')->nullable();
            $table->string('tingkat_prestasi')->nullable();
            $table->string('nama_prestasi')->nullable();
            $table->string('tahun_prestasi', 4)->nullable();
            $table->string('penyelenggara')->nullable();
            $table->string('peringkat', 40)->nullable();

            // Data Sekolah Sebelumnya
            $table->unsignedBigInteger('id_asal_sekolah');
            $table->foreign('id_asal_sekolah')->references('id')->on('asal_sekolah')->onUpdate('cascade')->onDelete('restrict');
            $table->string('no_peserta_un');
            $table->string('no_seri_ijazah');
            $table->string('no_seri_skhun');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calon_siswa');
    }
}
