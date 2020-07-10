<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Agama;
use App\Models\AsalSekolah;
use App\Models\CalonSiswa;
use App\Models\Jalur;
use App\Models\Jurusan;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\Penghasilan;
use App\Models\TempatTinggal;
use App\Models\Transportasi;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use PDF;
// Laporan Excel
use App\Exports\CalonSiswaExport;
use Hamcrest\Text\IsEmptyString;
use Maatwebsite\Excel\Facades\Excel;

class CalonSiswaController extends Controller
{
    /** 
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $jumlahCalonSiswa = CalonSiswa::all()->count();
        $jumlahUser = User::all()->count();

        // Hitung Calon Siswa Perjurusan
        $jumlahTKJ = DB::table('calon_siswa')->where('id_pilihan_jurusan_satu', '=', '1')->count();
        $jumlahTKR = DB::table('calon_siswa')->where('id_pilihan_jurusan_satu', '=', '2')->count();
        $jumlahFarmasi = DB::table('calon_siswa')->where('id_pilihan_jurusan_satu', '=', '3')->count();
        $jumlahTelin = DB::table('calon_siswa')->where('id_pilihan_jurusan_satu', '=', '4')->count();
        $jumlahRPL = DB::table('calon_siswa')->where('id_pilihan_jurusan_satu', '=', '5')->count();
        $jumlahTSM = DB::table('calon_siswa')->where('id_pilihan_jurusan_satu', '=', '6')->count();
        $jumlahAP = DB::table('calon_siswa')->where('id_pilihan_jurusan_satu', '=', '7')->count();

        // Hitung Calon Siswa per-jenis kelamin
        $jumlahLakiLaki = DB::table('calon_siswa')->where('jenis_kelamin', '=', 'Laki-laki')->count();
        $jumlahPerempuan = DB::table('calon_siswa')->where('jenis_kelamin', '=', 'Perempuan')->count();

        
        return view('dashboard', ['jumlahUser' => $jumlahUser, 'jumlahCalonSiswa' => $jumlahCalonSiswa, 'jumlahTKJ' => $jumlahTKJ, 'jumlahTKR' => $jumlahTKR, 'jumlahFarmasi' => $jumlahFarmasi, 'jumlahTelin' => $jumlahTelin, 'jumlahRPL' => $jumlahRPL, 'jumlahTSM' => $jumlahTSM, 'jumlahAP' => $jumlahAP, 'jumlahLakiLaki' => $jumlahLakiLaki, 'jumlahPerempuan' => $jumlahPerempuan]);
    }
    public function index()
    {

        $calonSiswa = CalonSiswa::all();
        return view('list_pendaftar', ['calonSiswa' => $calonSiswa]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $jalur = Jalur::all();
        $agama = Agama::all();
        $tempatTinggal = TempatTinggal::all();
        $modaTransportasi = Transportasi::all();
        $pekerjaan = Pekerjaan::all();
        $penghasilan = Penghasilan::all();
        $pendidikan = Pendidikan::all();
        $asalSekolah = AsalSekolah::all();

        return view('tambah_pendaftar', ['jalur' => $jalur, 'jurusan' => $jurusan, 'agama' => $agama, 'tempatTinggal' => $tempatTinggal, 'modaTransportasi' => $modaTransportasi,
        'pekerjaan' => $pekerjaan, 'penghasilan' => $penghasilan, 'pendidikan' => $pendidikan,'asalSekolah' => $asalSekolah]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            // TODO complete numeric validation
            'no_daftar' => 'required|numeric|unique:calon_siswa,no_daftar',
            'id_jalur' => 'required',
            'id_pilihan_jurusan_satu' => 'required',
            'id_pilihan_jurusan_dua' => 'required',
            'id_pilihan_jurusan_tiga' => 'required',

            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'no_kartu_keluarga' => 'required',
            'no_reg_akta_kelahiran' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'id_agama' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'dusun' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'kabupaten' => 'required',
            'id_tempat_tinggal' => 'required',
            'id_transportasi' => 'required',
            'punya_kip' => 'required',
            
            'nama_ayah_kandung' => 'required',
            'nik_ayah' => 'required',
            'tahun_lahir_ayah' => 'required',
            'id_pendidikan_ayah' => 'required',
            'id_pekerjaan_ayah' => 'required',
            'id_penghasilan_ayah' => 'required',
            'nama_ibu_kandung' => 'required',
            'nik_ibu' => 'required',
            'tahun_lahir_ibu' => 'required',
            'id_pendidikan_ibu' => 'required',
            'id_pekerjaan_ibu' => 'required',
            'id_penghasilan_ibu' => 'required',
            
            'tinggi_badan' => 'required',
            'berat_badan'=> 'required',
            'jarak_rumah_ke_sekolah' => 'required',
            'waktu_tempuh' => 'required',
            'anak_ke' => 'required',
            'jumlah_saudara_kandung' => 'required',
            
            'id_asal_sekolah' => 'required',
            'no_peserta_un' => 'required',
            'no_seri_ijazah' => 'required',
            'no_seri_skhun' => 'required'
            
        ];

        $message = [
            'no_daftar.required' => 'Nomor Pendaftaran tidak boleh kosong dan harus angka!',
            'no_daftar.unique' => 'No. Daftar sudah dipilih!',
            'no_daftar.numeric' => 'No. Daftar harus angka!',
            'id_jalur.required' => 'Pilih salah satu jalur pendaftaran!',
            'id_pilihan_jurusan_satu.required' => 'Pilihan jurusan satu harus diisi!',
            'id_pilihan_jurusan_dua.required' => 'Pilihan jurusan dua harus diisi!',
            'id_pilihan_jurusan_tiga.required' => 'Pilihan jurusan tiga harus diisi!',

            'nama_lengkap.required' => 'Nama Lengkap pendaftar tidak boleh kosong!',
            'jenis_kelamin.required' => 'Pilih jenis kelamin!',
            'nisn.required' => 'NISN tidak boleh kosong!',
            'nik.required' => 'NIK tidak boleh kosong!',
            'no_kartu_keluarga.required' => 'No. Kartu Kelurga tidak boleh kosong!',
            'no_reg_akta_kelahiran.required' => 'No. Regsitrasi Akta tidak boleh kosong!',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong!',
            'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong!',
            'id_agama.required' => 'Tolong pilih agama!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'rt.required' => 'RT tidak boleh kosong!',
            'rw.required' => 'RW tidak boleh kosong!',
            'dusun.required' => 'Dusun tidak boleh kosong!',
            'desa_kelurahan.required' => 'Desa/Kelurahan tidak boleh kosong!',
            'kecamatan.required' => 'Kecamatan tidak boleh kosong!',
            'kode_pos.required' => 'Kode Pos tidak boleh kosong!',
            'kabupaten.required' => 'Kabupaten tidak boleh kosong!',
            'id_tempat_tinggal.required' => 'Pilih Tempat Tinggal pendaftar!',
            'id_transportasi.required' => 'Pilih Moda Transportasi!',
            'punya_kip.required' => 'Pilih status kepunyaan KIP!',
            
            'nama_ayah_kandung.required' => 'Nama Ayah tidak boleh kosong!',
            'nik_ayah.required' => 'NIK Ayah tidak boleh kosong!',
            'tahun_lahir_ayah.required' => 'Tahun Lahir Ayah tidak boleh kosong!',
            'id_pendidikan_ayah.required' => 'Pilih Pendidikan Ayah!',
            'id_pekerjaan_ayah.required' => 'Pilih Pekerjaan Ayah!',
            'id_penghasilan_ayah.required' => 'Pilih Penghasilan Ayah!',
            'nama_ibu_kandung.required' => 'Nama Ibu tidak boleh kosong!',
            'nik_ibu.required' => 'NIK Ibu tidak boleh kosong!',
            'tahun_lahir_ibu.required' => 'Tahun Lahir Ibu tidak boleh kosong!',
            'id_pendidikan_ibu.required' => 'Pilih Pendidikan Ibu!',
            'id_pekerjaan_ibu.required' => ' Pilih Pekerjaan Ibu!',
            'id_penghasilan_ibu.required' => 'Pilih Penghasilan Ibu!',
            
            'tinggi_badan.required' => 'Tinggi Badan tidak boleh kosong!',
            'berat_badan'=> 'required',
            'jarak_rumah_ke_sekolah.required' => 'Jarak Rumah ke Sekolah tidak boleh kosong!',
            'waktu_tempuh.required' => 'Waktu Tempuh tidak boleh kosong!',
            'anak_ke.required' => 'Anak ke- tidak boleh kosong!',
            'jumlah_saudara_kandung.required' => 'Jumlah Saudara Kandung tidak boleh kosong!',
            
            'id_asal_sekolah.required' => 'Pilih Asal Sekolah!',
            'no_peserta_un.required' => 'No. Peserta UN tidak boleh kosong!',
            'no_seri_ijazah.required' => 'No. Seri Ijazah tidak boleh kosong!',
            'no_seri_skhun.required' => 'No. Seri SKHUN tidak boleh kosong!'

        ];

        $this->validate($request, $rules, $message);
        CalonSiswa::create($request->except(['datatable_length']));
        
        return response()->json(['message' => 'Data Pendaftar berhasil tersimpan']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalonSiswa  $calonSiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        $siswa = DB::table('calon_siswa as cs')
                    // Join table menggunakan Query Builder
                    ->join('jalur', 'cs.id_jalur', '=', 'jalur.id')
                    ->join('jurusan', 'cs.id_pilihan_jurusan_satu', '=', 'jurusan.id')
                    ->join('jurusan as jurusan2', 'cs.id_pilihan_jurusan_dua', '=', 'jurusan2.id')
                    ->join('jurusan as jurusan3', 'cs.id_pilihan_jurusan_tiga', '=', 'jurusan3.id')
                    ->join('agama', 'cs.id_agama', '=', 'agama.id')
                    ->join('tempat_tinggal', 'cs.id_tempat_tinggal', '=', 'tempat_tinggal.id')
                    ->join('transportasi', 'cs.id_transportasi', '=', 'transportasi.id')
                    ->join('pendidikan as tbl_pendidikan_ayah', 'cs.id_pendidikan_ayah', '=', 'tbl_pendidikan_ayah.id')
                    ->join('pekerjaan as tbl_pekerjaan_ayah', 'cs.id_pekerjaan_ayah', '=', 'tbl_pekerjaan_ayah.id')
                    ->join('penghasilan as tbl_penghasilan_ayah', 'cs.id_penghasilan_ayah', '=', 'tbl_penghasilan_ayah.id')

                    ->join('pendidikan as tbl_pendidikan_ibu', 'cs.id_pendidikan_ibu', '=', 'tbl_pendidikan_ibu.id')
                    ->join('pekerjaan as tbl_pekerjaan_ibu', 'cs.id_pekerjaan_ibu', '=', 'tbl_pekerjaan_ibu.id')
                    ->join('penghasilan as tbl_penghasilan_ibu', 'cs.id_penghasilan_ibu', '=', 'tbl_penghasilan_ibu.id')

                
                    ->leftJoin('pendidikan as tbl_pendidikan_wali', 'cs.id_pendidikan_wali', '=', 'tbl_pendidikan_wali.id')
                    ->leftJoin('pekerjaan as tbl_pekerjaan_wali', 'cs.id_pekerjaan_wali', '=', 'tbl_pekerjaan_wali.id')
                    ->leftJoin('penghasilan as tbl_penghasilan_wali', 'cs.id_penghasilan_wali', '=', 'tbl_penghasilan_wali.id')

                    ->join('asal_sekolah as tbl_asal_sekolah', 'cs.id_asal_sekolah', '=', 'tbl_asal_sekolah.id')
                    
                   
                    // Pilih Field yang akan ditampilkan
                    ->select('cs.id', 'cs.nama_lengkap','cs.no_daftar', 'jalur.nama_jalur', 'jurusan.nama_jurusan as pilihan_jurusan_satu', 'jurusan2.nama_jurusan as pilihan_jurusan_dua', 'jurusan3.nama_jurusan as pilihan_jurusan_tiga', 'cs.nisn', 'cs.jenis_kelamin', 'cs.nik', 'cs.no_kartu_keluarga', 'cs.no_reg_akta_kelahiran', 'cs.tempat_lahir', 'cs.tanggal_lahir', 'agama.agama', 'cs.alamat', 'cs.rt', 'cs.rw', 'cs.dusun', 'cs.desa_kelurahan', 'cs.kecamatan', 'cs.kode_pos', 'cs.kabupaten', 'tempat_tinggal.nama_tempat_tinggal', 'transportasi.nama_moda', 'cs.punya_kip', 'cs.no_kip', 'cs.nama_pada_kip', 'cs.nama_ayah_kandung', 'cs.nik_ayah', 'cs.tahun_lahir_ayah', 'tbl_pendidikan_ayah.nama_pendidikan as pendidikan_ayah', 'tbl_pekerjaan_ayah.nama_pekerjaan as pekerjaan_ayah', 'tbl_penghasilan_ayah.jumlah_penghasilan as penghasilan_ayah', 'cs.nama_ibu_kandung', 'cs.nik_ibu', 'cs.tahun_lahir_ibu', 'tbl_pendidikan_ibu.nama_pendidikan as pendidikan_ibu', 'tbl_pekerjaan_ibu.nama_pekerjaan as pekerjaan_ibu', 'tbl_penghasilan_ibu.jumlah_penghasilan as penghasilan_ibu', 'cs.nama_wali', 'cs.nik_wali', 'cs.tahun_lahir_wali', 'tbl_pendidikan_wali.nama_pendidikan as pendidikan_wali', 'tbl_pekerjaan_wali.nama_pekerjaan as pekerjaan_wali', 'tbl_penghasilan_wali.jumlah_penghasilan as penghasilan_wali','cs.no_telepon_rumah', 'cs.no_telepon', 'cs.email', 'cs.tinggi_badan', 'cs.berat_badan', 'cs.lingkar_kepala', 'cs.jarak_rumah_ke_sekolah', 'cs.waktu_tempuh', 'cs.anak_ke', 'cs.jumlah_saudara_kandung', 'cs.jenis_prestasi', 'cs.tingkat_prestasi', 'cs.nama_prestasi', 'cs.tahun_prestasi', 'cs.penyelenggara', 'cs.peringkat', 'tbl_asal_sekolah.nama_sekolah as asal_sekolah', 'cs.no_peserta_un', 'cs.no_seri_ijazah', 'cs.no_seri_skhun', 'cs.created_at as tanggal_input_data', 'cs.updated_at as terakhir_data_diperbaharui')

                    // Field dibawah akan dipanggil menggunakan AJAX Request

                    // 'cs.nama_wali', 'cs.nik_wali', 'cs.tahun_lahir_wali', 'tbl_pendidikan_wali.nama_pendidikan as pendidikan_wali', 'tbl_pekerjaan_wali.nama_pekerjaan as pekerjaan_wali', 'tbl_penghasilan_wali.jumlah_penghasilan as penghasilan_wali',

                    // Klausa where yang menentukan id Pendaftar
                    ->where('cs.id', '=', $id)
                    // Ambil data
                    ->get();
        
        return view('profil_siswa', ['siswa' => $siswa[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalonSiswa  $calonSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(CalonSiswa $calonSiswa, $id)
    {
        $jurusan = Jurusan::all();
        $jalur = Jalur::all();
        $agama = Agama::all();
        $tempatTinggal = TempatTinggal::all();
        $modaTransportasi = Transportasi::all();
        $pekerjaan = Pekerjaan::all();
        $penghasilan = Penghasilan::all();
        $pendidikan = Pendidikan::all();
        $asalSekolah = AsalSekolah::all();

        $siswa = DB::table('calon_siswa as cs')
                    // Join table menggunakan Query Builder
                    ->join('jalur', 'cs.id_jalur', '=', 'jalur.id')
                    ->join('jurusan', 'cs.id_pilihan_jurusan_satu', '=', 'jurusan.id')
                    ->join('jurusan as jurusan2', 'cs.id_pilihan_jurusan_dua', '=', 'jurusan2.id')
                    ->join('jurusan as jurusan3', 'cs.id_pilihan_jurusan_tiga', '=', 'jurusan3.id')
                    ->join('agama', 'cs.id_agama', '=', 'agama.id')
                    ->join('tempat_tinggal', 'cs.id_tempat_tinggal', '=', 'tempat_tinggal.id')
                    ->join('transportasi', 'cs.id_transportasi', '=', 'transportasi.id')
                    ->join('pendidikan as tbl_pendidikan_ayah', 'cs.id_pendidikan_ayah', '=', 'tbl_pendidikan_ayah.id')
                    ->join('pekerjaan as tbl_pekerjaan_ayah', 'cs.id_pekerjaan_ayah', '=', 'tbl_pekerjaan_ayah.id')
                    ->join('penghasilan as tbl_penghasilan_ayah', 'cs.id_penghasilan_ayah', '=', 'tbl_penghasilan_ayah.id')

                    ->join('pendidikan as tbl_pendidikan_ibu', 'cs.id_pendidikan_ibu', '=', 'tbl_pendidikan_ibu.id')
                    ->join('pekerjaan as tbl_pekerjaan_ibu', 'cs.id_pekerjaan_ibu', '=', 'tbl_pekerjaan_ibu.id')
                    ->join('penghasilan as tbl_penghasilan_ibu', 'cs.id_penghasilan_ibu', '=', 'tbl_penghasilan_ibu.id')

                
                    ->leftJoin('pendidikan as tbl_pendidikan_wali', 'cs.id_pendidikan_wali', '=', 'tbl_pendidikan_wali.id')
                    ->leftJoin('pekerjaan as tbl_pekerjaan_wali', 'cs.id_pekerjaan_wali', '=', 'tbl_pekerjaan_wali.id')
                    ->leftJoin('penghasilan as tbl_penghasilan_wali', 'cs.id_penghasilan_wali', '=', 'tbl_penghasilan_wali.id')

                    ->join('asal_sekolah as tbl_asal_sekolah', 'cs.id_asal_sekolah', '=', 'tbl_asal_sekolah.id')
                    
                   
                    // Pilih Field yang akan ditampilkan
                    ->select('cs.id', 'cs.no_daftar', 'cs.nama_lengkap','cs.no_daftar','cs.id_jalur', 'jalur.nama_jalur','cs.id_pilihan_jurusan_satu', 'jurusan.nama_jurusan as pilihan_jurusan_satu','cs.id_pilihan_jurusan_dua', 'jurusan2.nama_jurusan as pilihan_jurusan_dua', 'cs.id_pilihan_jurusan_tiga', 'jurusan3.nama_jurusan as pilihan_jurusan_tiga', 'cs.nisn', 'cs.jenis_kelamin', 'cs.nik', 'cs.no_kartu_keluarga', 'cs.no_reg_akta_kelahiran', 'cs.tempat_lahir', 'cs.tanggal_lahir', 'cs.id_agama', 'agama.agama', 'cs.alamat', 'cs.rt', 'cs.rw', 'cs.dusun', 'cs.desa_kelurahan', 'cs.kecamatan', 'cs.kode_pos', 'cs.kabupaten', 'cs.id_tempat_tinggal', 'tempat_tinggal.nama_tempat_tinggal', 'cs.id_transportasi', 'transportasi.nama_moda', 'cs.punya_kip', 'cs.no_kip', 'cs.nama_pada_kip', 'cs.nama_ayah_kandung', 'cs.nik_ayah', 'cs.tahun_lahir_ayah','cs.id_pendidikan_ayah', 'tbl_pendidikan_ayah.nama_pendidikan as pendidikan_ayah', 'cs.id_pekerjaan_ayah', 'tbl_pekerjaan_ayah.nama_pekerjaan as pekerjaan_ayah', 'cs.id_penghasilan_ayah', 'tbl_penghasilan_ayah.jumlah_penghasilan as penghasilan_ayah', 'cs.nama_ibu_kandung', 'cs.nik_ibu', 'cs.tahun_lahir_ibu','cs.id_pendidikan_ibu', 'tbl_pendidikan_ibu.nama_pendidikan as pendidikan_ibu', 'cs.id_pekerjaan_ibu', 'tbl_pekerjaan_ibu.nama_pekerjaan as pekerjaan_ibu', 'cs.id_penghasilan_ibu', 'tbl_penghasilan_ibu.jumlah_penghasilan as penghasilan_ibu', 'cs.nama_wali', 'cs.nik_wali', 'cs.tahun_lahir_wali', 'cs.id_pendidikan_wali', 'tbl_pendidikan_wali.nama_pendidikan as pendidikan_wali', 'cs.id_pekerjaan_wali', 'tbl_pekerjaan_wali.nama_pekerjaan as pekerjaan_wali', 'cs.id_penghasilan_wali', 'tbl_penghasilan_wali.jumlah_penghasilan as penghasilan_wali','cs.no_telepon_rumah', 'cs.no_telepon', 'cs.email', 'cs.tinggi_badan', 'cs.berat_badan', 'cs.lingkar_kepala', 'cs.jarak_rumah_ke_sekolah', 'cs.waktu_tempuh', 'cs.anak_ke', 'cs.jumlah_saudara_kandung', 'cs.jenis_prestasi', 'cs.tingkat_prestasi', 'cs.nama_prestasi', 'cs.tahun_prestasi', 'cs.penyelenggara', 'cs.peringkat','cs.id_asal_sekolah', 'tbl_asal_sekolah.nama_sekolah as asal_sekolah', 'cs.no_peserta_un', 'cs.no_seri_ijazah', 'cs.no_seri_skhun', 'cs.created_at as tanggal_input_data', 'cs.updated_at as terakhir_data_diperbaharui')


                    // Klausa where yang menentukan id Pendaftar
                    ->where('cs.id', '=', $id)
                    // Ambil data
                    ->get();
        

        return view('edit_pendaftar', ['siswa' => $siswa[0], 'jalur' => $jalur, 'jurusan' => $jurusan, 'agama' => $agama, 'tempatTinggal' => $tempatTinggal, 'modaTransportasi' => $modaTransportasi,
        'pekerjaan' => $pekerjaan, 'penghasilan' => $penghasilan, 'pendidikan' => $pendidikan,'asalSekolah' => $asalSekolah]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CalonSiswa  $calonSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalonSiswa $calonSiswa)
    {
        // dd($request->id);

        $rules = [
            // ! add unique validation to no_daftar
            'no_daftar' => 'required|unique:calon_siswa,no_daftar,'. $request->id,
            'id_jalur' => 'required',
            'id_pilihan_jurusan_satu' => 'required',
            'id_pilihan_jurusan_dua' => 'required',
            'id_pilihan_jurusan_tiga' => 'required',

            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'no_kartu_keluarga' => 'required',
            'no_reg_akta_kelahiran' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'id_agama' => 'required',
            'alamat' => 'required',
            'rt' => 'required',
            'rw' => 'required',
            'dusun' => 'required',
            'desa_kelurahan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'kabupaten' => 'required',
            'id_tempat_tinggal' => 'required',
            'id_transportasi' => 'required',
            'punya_kip' => 'required',
            
            'nama_ayah_kandung' => 'required',
            'nik_ayah' => 'required',
            'tahun_lahir_ayah' => 'required',
            'id_pendidikan_ayah' => 'required',
            'id_pekerjaan_ayah' => 'required',
            'id_penghasilan_ayah' => 'required',
            'nama_ibu_kandung' => 'required',
            'nik_ibu' => 'required',
            'tahun_lahir_ibu' => 'required',
            'id_pendidikan_ibu' => 'required',
            'id_pekerjaan_ibu' => 'required',
            'id_penghasilan_ibu' => 'required',
            
            'tinggi_badan' => 'required',
            'berat_badan'=> 'required',
            'jarak_rumah_ke_sekolah' => 'required',
            'waktu_tempuh' => 'required',
            'anak_ke' => 'required',
            'jumlah_saudara_kandung' => 'required',
            
            'id_asal_sekolah' => 'required',
            'no_peserta_un' => 'required',
            'no_seri_ijazah' => 'required',
            'no_seri_skhun' => 'required'
            
        ];

        $message = [
            'no_daftar.required' => 'Nomor Pendaftaran tidak boleh kosong dan harus angka!',
            'no_daftar.unique' => 'No. Daftar sudah dipilih!',
            'id_jalur.required' => 'Pilih salah satu jalur pendaftaran!',
            'id_pilihan_jurusan_satu.required' => 'Pilihan jurusan satu harus diisi!',
            'id_pilihan_jurusan_dua.required' => 'Pilihan jurusan dua harus diisi!',
            'id_pilihan_jurusan_tiga.required' => 'Pilihan jurusan tiga harus diisi!',

            'nama_lengkap.required' => 'Nama Lengkap pendaftar tidak boleh kosong!',
            'jenis_kelamin.required' => 'Pilih jenis kelamin!',
            'nisn.required' => 'NISN tidak boleh kosong!',
            'nik.required' => 'NIK tidak boleh kosong!',
            'no_kartu_keluarga.required' => 'No. Kartu Kelurga tidak boleh kosong!',
            'no_reg_akta_kelahiran.required' => 'No. Regsitrasi Akta tidak boleh kosong!',
            'tempat_lahir.required' => 'Tempat Lahir tidak boleh kosong!',
            'tanggal_lahir.required' => 'Tanggal Lahir tidak boleh kosong!',
            'id_agama.required' => 'Tolong pilih agama!',
            'alamat.required' => 'Alamat tidak boleh kosong!',
            'rt.required' => 'RT tidak boleh kosong!',
            'rw.required' => 'RW tidak boleh kosong!',
            'dusun.required' => 'Dusun tidak boleh kosong!',
            'desa_kelurahan.required' => 'Desa/Kelurahan tidak boleh kosong!',
            'kecamatan.required' => 'Kecamatan tidak boleh kosong!',
            'kode_pos.required' => 'Kode Pos tidak boleh kosong!',
            'kabupaten.required' => 'Kabupaten tidak boleh kosong!',
            'id_tempat_tinggal.required' => 'Pilih Tempat Tinggal pendaftar!',
            'id_transportasi.required' => 'Pilih Moda Transportasi!',
            'punya_kip.required' => 'Pilih status kepunyaan KIP!',
            
            'nama_ayah_kandung.required' => 'Nama Ayah tidak boleh kosong!',
            'nik_ayah.required' => 'NIK Ayah tidak boleh kosong!',
            'tahun_lahir_ayah.required' => 'Tahun Lahir Ayah tidak boleh kosong!',
            'id_pendidikan_ayah.required' => 'Pilih Pendidikan Ayah!',
            'id_pekerjaan_ayah.required' => 'Pilih Pekerjaan Ayah!',
            'id_penghasilan_ayah.required' => 'Pilih Penghasilan Ayah!',
            'nama_ibu_kandung.required' => 'Nama Ibu tidak boleh kosong!',
            'nik_ibu.required' => 'NIK Ibu tidak boleh kosong!',
            'tahun_lahir_ibu.required' => 'Tahun Lahir Ibu tidak boleh kosong!',
            'id_pendidikan_ibu.required' => 'Pilih Pendidikan Ibu!',
            'id_pekerjaan_ibu.required' => ' Pilih Pekerjaan Ibu!',
            'id_penghasilan_ibu.required' => 'Pilih Penghasilan Ibu!',
            
            'tinggi_badan.required' => 'Tinggi Badan tidak boleh kosong!',
            'berat_badan'=> 'required',
            'jarak_rumah_ke_sekolah.required' => 'Jarak Rumah ke Sekolah tidak boleh kosong!',
            'waktu_tempuh.required' => 'Waktu Tempuh tidak boleh kosong!',
            'anak_ke.required' => 'Anak ke- tidak boleh kosong!',
            'jumlah_saudara_kandung.required' => 'Jumlah Saudara Kandung tidak boleh kosong!',
            
            'id_asal_sekolah.required' => 'Pilih Asal Sekolah!',
            'no_peserta_un.required' => 'No. Peserta UN tidak boleh kosong!',
            'no_seri_ijazah.required' => 'No. Seri Ijazah tidak boleh kosong!',
            'no_seri_skhun.required' => 'No. Seri SKHUN tidak boleh kosong!'

        ];

        $this->validate($request, $rules, $message);


        $calonSiswa = CalonSiswa::findOrFail($request->id);
        $calonSiswa->update($request->all());

        return response()->json([
            'message' => 'Data berhasil diperbaharui!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalonSiswa  $calonSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calonSiswa = CalonSiswa::findOrFail($id);
        $calonSiswa->delete();

        return response()->json([
            'message' => 'Data berhasil Terhapus!'
        ]);

        
    }

    // Function untuk menamplikan data json untuk datatable
    public function datatable(){
        $calonSiswa = DB::table('calon_siswa')
            ->join('asal_sekolah', 'asal_sekolah.id', '=', 'calon_siswa.id_asal_sekolah')
            ->join('jurusan', 'jurusan.id', '=', 'calon_siswa.id_pilihan_jurusan_satu')
            ->select(['calon_siswa.id', 'calon_siswa.no_daftar', 'calon_siswa.nisn', 'calon_siswa.nama_lengkap','asal_sekolah.nama_sekolah', 'jurusan.nama_jurusan']);
        
        return DataTables::queryBuilder($calonSiswa)
        ->addColumn('aksi', function($calonSiswa){
            return '<a href="'.route('ppdb.destroy', $calonSiswa->id).'" id="btnHapus" class="button btn btn-sm btn-danger" data-id="'. $calonSiswa->id .'"><i class="fas fa-trash"></i></a>
                    <a href="'.route('ppdb.show', $calonSiswa->id).'" class="button btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                    <a href="'.route('ppdb.edit', $calonSiswa->id).'" class="button btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                    ';
        })
        ->addIndexColumn()
        ->rawColumns(['aksi'])
        ->make(true);
    }

    // Function untuk mencetak data persiswa
    public function printPDF($id){
        $siswa = DB::table('calon_siswa as cs')
                    ->join('jalur', 'cs.id_jalur', '=', 'jalur.id')
                    ->join('jurusan', 'cs.id_pilihan_jurusan_satu', '=', 'jurusan.id')
                    ->join('jurusan as jurusan2', 'cs.id_pilihan_jurusan_dua', '=', 'jurusan2.id')
                    ->join('jurusan as jurusan3', 'cs.id_pilihan_jurusan_tiga', '=', 'jurusan3.id')
                    ->join('agama', 'cs.id_agama', '=', 'agama.id')
                    ->join('tempat_tinggal', 'cs.id_tempat_tinggal', '=', 'tempat_tinggal.id')
                    ->join('transportasi', 'cs.id_transportasi', '=', 'transportasi.id')
                    ->join('pendidikan as tbl_pendidikan_ayah', 'cs.id_pendidikan_ayah', '=', 'tbl_pendidikan_ayah.id')
                    ->join('pekerjaan as tbl_pekerjaan_ayah', 'cs.id_pekerjaan_ayah', '=', 'tbl_pekerjaan_ayah.id')
                    ->join('penghasilan as tbl_penghasilan_ayah', 'cs.id_penghasilan_ayah', '=', 'tbl_penghasilan_ayah.id')

                    ->join('pendidikan as tbl_pendidikan_ibu', 'cs.id_pendidikan_ibu', '=', 'tbl_pendidikan_ibu.id')
                    ->join('pekerjaan as tbl_pekerjaan_ibu', 'cs.id_pekerjaan_ibu', '=', 'tbl_pekerjaan_ibu.id')
                    ->join('penghasilan as tbl_penghasilan_ibu', 'cs.id_penghasilan_ibu', '=', 'tbl_penghasilan_ibu.id')

                    ->leftJoin('pendidikan as tbl_pendidikan_wali', 'cs.id_pendidikan_wali', '=', 'tbl_pendidikan_wali.id')
                    ->leftJoin('pekerjaan as tbl_pekerjaan_wali', 'cs.id_pekerjaan_wali', '=', 'tbl_pekerjaan_wali.id')
                    ->leftJoin('penghasilan as tbl_penghasilan_wali', 'cs.id_penghasilan_wali', '=', 'tbl_penghasilan_wali.id')

                    ->join('asal_sekolah as tbl_asal_sekolah', 'cs.id_asal_sekolah', '=', 'tbl_asal_sekolah.id')
                    
                   
                    ->select('cs.id', 'cs.nama_lengkap','cs.no_daftar', 'jalur.nama_jalur', 'jurusan.nama_jurusan as pilihan_jurusan_satu', 'jurusan2.nama_jurusan as pilihan_jurusan_dua', 'jurusan3.nama_jurusan as pilihan_jurusan_tiga', 'cs.nisn', 'cs.jenis_kelamin', 'cs.nik', 'cs.no_kartu_keluarga', 'cs.no_reg_akta_kelahiran', 'cs.tempat_lahir', 'cs.tanggal_lahir', 'agama.agama', 'cs.alamat', 'cs.rt', 'cs.rw', 'cs.dusun', 'cs.desa_kelurahan', 'cs.kecamatan', 'cs.kode_pos', 'cs.kabupaten', 'tempat_tinggal.nama_tempat_tinggal', 'transportasi.nama_moda', 'cs.punya_kip', 'cs.no_kip', 'cs.nama_pada_kip', 'cs.nama_ayah_kandung', 'cs.nik_ayah', 'cs.tahun_lahir_ayah', 'tbl_pendidikan_ayah.nama_pendidikan as pendidikan_ayah', 'tbl_pekerjaan_ayah.nama_pekerjaan as pekerjaan_ayah', 'tbl_penghasilan_ayah.jumlah_penghasilan as penghasilan_ayah', 'cs.nama_ibu_kandung', 'cs.nik_ibu', 'cs.tahun_lahir_ibu', 'tbl_pendidikan_ibu.nama_pendidikan as pendidikan_ibu', 'tbl_pekerjaan_ibu.nama_pekerjaan as pekerjaan_ibu', 'tbl_penghasilan_ibu.jumlah_penghasilan as penghasilan_ibu', 'cs.nama_wali', 'cs.nik_wali', 'cs.tahun_lahir_wali', 'tbl_pendidikan_wali.nama_pendidikan as pendidikan_wali', 'tbl_pekerjaan_wali.nama_pekerjaan as pekerjaan_wali', 'tbl_penghasilan_wali.jumlah_penghasilan as penghasilan_wali','cs.no_telepon_rumah', 'cs.no_telepon', 'cs.email', 'cs.tinggi_badan', 'cs.berat_badan', 'cs.lingkar_kepala', 'cs.jarak_rumah_ke_sekolah', 'cs.waktu_tempuh', 'cs.anak_ke', 'cs.jumlah_saudara_kandung', 'cs.jenis_prestasi', 'cs.tingkat_prestasi', 'cs.nama_prestasi', 'cs.tahun_prestasi', 'cs.penyelenggara', 'cs.peringkat', 'tbl_asal_sekolah.nama_sekolah as asal_sekolah', 'cs.no_peserta_un', 'cs.no_seri_ijazah', 'cs.no_seri_skhun', 'cs.created_at as tanggal_input_data', 'cs.updated_at as terakhir_data_diperbaharui')

                    ->where('cs.id', '=', $id)
                    ->get();
        
        return view('siswa_pdf', ['siswa' => $siswa[0]]);
       
    }

    // Function untuk mencetak laporan excel
    public function printExcel()
    {
        return Excel::download(new CalonSiswaExport, 'laporan_seluruh_pendaftar.xlsx');
    }
}
