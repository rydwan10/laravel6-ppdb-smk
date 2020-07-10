<?php

namespace App\Exports;

use App\Models\CalonSiswa;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class CalonSiswaExport implements FromQuery
{
    // use Exportable;

    public function query()
    {
        return CalonSiswa::query()->join('jalur', 'calon_siswa.id_jalur', '=', 'jalur.id')
        ->join('jurusan', 'calon_siswa.id_pilihan_jurusan_satu', '=', 'jurusan.id')
        ->join('jurusan as jurusan2', 'calon_siswa.id_pilihan_jurusan_dua', '=', 'jurusan2.id')
        ->join('jurusan as jurusan3', 'calon_siswa.id_pilihan_jurusan_tiga', '=', 'jurusan3.id')
        ->join('agama', 'calon_siswa.id_agama', '=', 'agama.id')
        ->join('tempat_tinggal', 'calon_siswa.id_tempat_tinggal', '=', 'tempat_tinggal.id')
        ->join('transportasi', 'calon_siswa.id_transportasi', '=', 'transportasi.id')
        ->join('pendidikan as tbl_pendidikan_ayah', 'calon_siswa.id_pendidikan_ayah', '=', 'tbl_pendidikan_ayah.id')
        ->join('pekerjaan as tbl_pekerjaan_ayah', 'calon_siswa.id_pekerjaan_ayah', '=', 'tbl_pekerjaan_ayah.id')
        ->join('penghasilan as tbl_penghasilan_ayah', 'calon_siswa.id_penghasilan_ayah', '=', 'tbl_penghasilan_ayah.id')

        ->join('pendidikan as tbl_pendidikan_ibu', 'calon_siswa.id_pendidikan_ibu', '=', 'tbl_pendidikan_ibu.id')
        ->join('pekerjaan as tbl_pekerjaan_ibu', 'calon_siswa.id_pekerjaan_ibu', '=', 'tbl_pekerjaan_ibu.id')
        ->join('penghasilan as tbl_penghasilan_ibu', 'calon_siswa.id_penghasilan_ibu', '=', 'tbl_penghasilan_ibu.id')

    
        ->leftJoin('pendidikan as tbl_pendidikan_wali', 'calon_siswa.id_pendidikan_wali', '=', 'tbl_pendidikan_wali.id')
        ->leftJoin('pekerjaan as tbl_pekerjaan_wali', 'calon_siswa.id_pekerjaan_wali', '=', 'tbl_pekerjaan_wali.id')
        ->leftJoin('penghasilan as tbl_penghasilan_wali', 'calon_siswa.id_penghasilan_wali', '=', 'tbl_penghasilan_wali.id')

        ->join('asal_sekolah as tbl_asal_sekolah', 'calon_siswa.id_asal_sekolah', '=', 'tbl_asal_sekolah.id')
        
    
        ->select('calon_siswa.id', 'calon_siswa.nama_lengkap','calon_siswa.no_daftar', 'jalur.nama_jalur', 'jurusan.nama_jurusan as pilihan_jurusan_satu', 'jurusan2.nama_jurusan as pilihan_jurusan_dua', 'jurusan3.nama_jurusan as pilihan_jurusan_tiga', 'calon_siswa.nisn', 'calon_siswa.jenis_kelamin', 'calon_siswa.nik', 'calon_siswa.no_kartu_keluarga', 'calon_siswa.no_reg_akta_kelahiran', 'calon_siswa.tempat_lahir', 'calon_siswa.tanggal_lahir', 'agama.agama', 'calon_siswa.alamat', 'calon_siswa.rt', 'calon_siswa.rw', 'calon_siswa.dusun', 'calon_siswa.desa_kelurahan', 'calon_siswa.kecamatan', 'calon_siswa.kode_pos', 'calon_siswa.kabupaten', 'tempat_tinggal.nama_tempat_tinggal', 'transportasi.nama_moda', 'calon_siswa.punya_kip', 'calon_siswa.no_kip', 'calon_siswa.nama_pada_kip', 'calon_siswa.nama_ayah_kandung', 'calon_siswa.nik_ayah', 'calon_siswa.tahun_lahir_ayah', 'tbl_pendidikan_ayah.nama_pendidikan as pendidikan_ayah', 'tbl_pekerjaan_ayah.nama_pekerjaan as pekerjaan_ayah', 'tbl_penghasilan_ayah.jumlah_penghasilan as penghasilan_ayah', 'calon_siswa.nama_ibu_kandung', 'calon_siswa.nik_ibu', 'calon_siswa.tahun_lahir_ibu', 'tbl_pendidikan_ibu.nama_pendidikan as pendidikan_ibu', 'tbl_pekerjaan_ibu.nama_pekerjaan as pekerjaan_ibu', 'tbl_penghasilan_ibu.jumlah_penghasilan as penghasilan_ibu', 'calon_siswa.nama_wali', 'calon_siswa.nik_wali', 'calon_siswa.tahun_lahir_wali', 'tbl_pendidikan_wali.nama_pendidikan as pendidikan_wali', 'tbl_pekerjaan_wali.nama_pekerjaan as pekerjaan_wali', 'tbl_penghasilan_wali.jumlah_penghasilan as penghasilan_wali','calon_siswa.no_telepon_rumah', 'calon_siswa.no_telepon', 'calon_siswa.email', 'calon_siswa.tinggi_badan', 'calon_siswa.berat_badan', 'calon_siswa.lingkar_kepala', 'calon_siswa.jarak_rumah_ke_sekolah', 'calon_siswa.waktu_tempuh', 'calon_siswa.anak_ke', 'calon_siswa.jumlah_saudara_kandung', 'calon_siswa.jenis_prestasi', 'calon_siswa.tingkat_prestasi', 'calon_siswa.nama_prestasi', 'calon_siswa.tahun_prestasi', 'calon_siswa.penyelenggara', 'calon_siswa.peringkat', 'tbl_asal_sekolah.nama_sekolah as asal_sekolah', 'calon_siswa.no_peserta_un', 'calon_siswa.no_seri_ijazah', 'calon_siswa.no_seri_skhun', 'calon_siswa.created_at as tanggal_input_data', 'calon_siswa.updated_at as terakhir_data_diperbaharui');

    
    }
}