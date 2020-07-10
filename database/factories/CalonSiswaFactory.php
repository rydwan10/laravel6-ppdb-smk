<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\CalonSiswa;
use Faker\Generator as Faker;

$factory->define(CalonSiswa::class, function (Faker $faker) {
    return [
        
            'id_jalur' => $faker->numberBetween($min = 1, $max = 2),
            'no_daftar' => $faker->unique()->numerify('###'),

            'id_pilihan_jurusan_satu' => $faker->numberBetween($min = 1, $max = 7),
            'id_pilihan_jurusan_dua' => $faker->numberBetween($min = 1, $max = 7),
            'id_pilihan_jurusan_tiga' => $faker->numberBetween($min = 1, $max = 7),

            'nama_lengkap' => $faker->name,
            'jenis_kelamin' => $faker->randomElement($array = array('Laki-laki', 'Perempuan')),
            'nisn' => $faker->randomNumber($nbDigits = 8),
            'nik' => $faker->randomNumber($nbDigits = 8),
            'no_kartu_keluarga' => $faker->randomNumber($nbDigits = 8),
            'no_reg_akta_kelahiran' => $faker->randomNumber($nbDigits = 8),
            'tempat_lahir' => $faker->city,
            'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = '2002-12-30'),
            'id_agama' => $faker->numberBetween($min = 1, $max = 6),

            'alamat' => $faker->address,
            'rt' => $faker->numberBetween($min = 1, $max = 50),
            'rw' => $faker->numberBetween($min = 1, $max = 50),
            'dusun' => $faker->city,
            'desa_kelurahan' => $faker->state,
            'kecamatan' => $faker->citySuffix,
            'kode_pos' => $faker->postcode,
            'kabupaten' => $faker->country,
            'id_tempat_tinggal' => $faker->numberBetween($min = 1, $max = 4),
            'id_transportasi' => $faker->numberBetween($min = 1, $max = 5),
            'punya_kip' => 'Tidak',
            
            'nama_ayah_kandung' => $faker->name($gender = 'male'),
            'nik_ayah' => $faker->randomNumber($nbDigits = 8),
            'tahun_lahir_ayah' => $faker->randomElement($array = array(1977, 1967, 1969)),
            'id_pendidikan_ayah' => $faker->numberBetween($min = 1, $max = 7),
            'id_pekerjaan_ayah' => $faker->numberBetween($min = 1, $max = 15),
            'id_penghasilan_ayah' => $faker->numberBetween($min = 1, $max = 6),

            'nama_ibu_kandung' => $faker->name($gender = 'female'),
            'nik_ibu' => $faker->randomNumber($nbDigits = 8),
            'tahun_lahir_ibu' => $faker->randomElement($array = array(1977, 1967, 1969)),
            'id_pendidikan_ibu' => $faker->numberBetween($min = 1, $max = 7),
            'id_pekerjaan_ibu' => $faker->numberBetween($min = 1, $max = 15),
            'id_penghasilan_ibu' => $faker->numberBetween($min = 1, $max = 6),

            'nama_wali' => $faker->name($gender = 'female'),
            'nik_wali' => $faker->randomNumber($nbDigits = 8),
            'tahun_lahir_wali' => $faker->randomElement($array = array(1977, 1967, 1969)),
            'id_pendidikan_wali' => $faker->numberBetween($min = 1, $max = 7),
            'id_pekerjaan_wali' => $faker->numberBetween($min = 1, $max = 15),
            'id_penghasilan_wali' => $faker->numberBetween($min = 1, $max = 6),
            
            'no_telepon_rumah' => $faker->tollFreePhoneNumber,
            'no_telepon' => $faker->e164PhoneNumber,
            'email' => $faker->unique()->freeEmail,

            'tinggi_badan' => $faker->numberBetween($min = 130, $max = 200),
            'berat_badan'=> $faker->numberBetween($min = 50, $max = 100),
            'lingkar_kepala' => $faker->numberBetween($min = 30, $max = 70),

            'jarak_rumah_ke_sekolah' => $faker->numberBetween($min = 1, $max = 20),
            'waktu_tempuh' => $faker->numberBetween($min = 1, $max = 20),
            'anak_ke' => $faker->numberBetween($min = 1, $max = 10),
            'jumlah_saudara_kandung' => $faker->numberBetween($min = 1, $max = 10),
            
            'id_asal_sekolah' => $faker->numberBetween($min = 1, $max = 5),
            'no_peserta_un' => $faker->randomNumber($nbDigits = 8),
            'no_seri_ijazah' => $faker->randomNumber($nbDigits = 8),
            'no_seri_skhun' => $faker->randomNumber($nbDigits = 8),
            'created_at' => $faker->dateTimeBetween('now', 'now')
    ];
});
