@extends('template.default')
@section('page_title', 'Tambah Pendaftar')
@section('content')

<form action="{{ route('ppdb.store') }}" id="form-tambah" method="POST">
  @csrf
  {{-- Awal baris pertama --}}
  <div class="row">
    {{-- Card 1 --}}
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">

            <div class="form-group">
              <label for="no_daftar">Nomor Daftar</label>
              <input type="text" class="form-control col-md-6" id="no_daftar" name="no_daftar" value="{{ old('no_daftar') }}">
            </div>
            <div class="form-group">
              <label for="id_jalur">Jalur</label>
              <select name="id_jalur" id="id_jalur" class="form-control col-md-6">
                <option value="" disabled selected>--Pilihan--</option>
                  @foreach ($jalur as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_jalur }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_pilihan_jurusan_satu">Pilihan Jurusan 1</label>
              <select name="id_pilihan_jurusan_satu" id="id_pilihan_jurusan_satu" class="form-control">
                <option value="" disabled selected>--Pilihan--</option>
                  @foreach ($jurusan as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_pilihan_jurusan_dua">Pilihan Jurusan 2</label>
              <select name="id_pilihan_jurusan_dua" id="id_pilihan_jurusan_dua" class="form-control">
                <option value="" disabled selected>--Pilihan--</option>
                  @foreach ($jurusan as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_pilihan_jurusan_tiga">Pilihan Jurusan 3</label>
              <select name="id_pilihan_jurusan_tiga" id="id_pilihan_jurusan_tiga" class="form-control">
                <option value="" disabled selected>--Pilihan--</option>
                  @foreach ($jurusan as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_jurusan }}</option>
                  @endforeach
              </select>
            </div>
        </div>
      </div>
    </div>
    {{-- End of card 1 --}}

    {{-- Start of card 2 --}}
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama_lengkap">Nama Lengkap</label>
              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
            </div>
            <div class="form-group">
              <label for="jenis_kelamin">Jenis Kelamin</label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control col-md-6">
                <option value="" disabled selected>--Pilihan--</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="nisn">NISN</label>
              <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn') }}">
            </div>
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" name="nik" id="nik" class="form-control" value="{{ old('nik') }}">
            </div>
            <div class="form-group">
              <label for="no_kartu_keluarga">No. Kartu Keluarga</label>
              <input type="text" name="no_kartu_keluarga" id="no_kartu_keluarga" class="form-control" value="{{ old('no_kartu_keluarga') }}">
            </div>
        </div>
      </div>
    </div>
    {{-- End of card 2 --}}
  </div>
  {{-- Akhir Baris pertama --}}

  {{-- Awal baris kedua --}}
    <div class="row">
    
    {{-- Awal card 1 --}}
    <div class="col-md-6">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body" style="padding-bottom: 95px;">
            <div class="form-group">
              <label for="no_reg_akta_kelahiran">No. Registrasi Akta Kelahiran</label>
              <input type="text" class="form-control" id="no_reg_akta_kelahiran" name="no_reg_akta_kelahiran" value="{{ old('no_reg_akta_kelahiran') }}">
            </div>
            <div class="form-group">
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
            </div>
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control col-md-6" value="{{ old('tanggal_lahir') }}">
            </div>
            <div class="form-group">
              <label for="id_agama">Agama</label>
              <select name="id_agama" id="id_agama" class="form-control col-md-6">
                <option value="" disabled selected>--Pilihan--</option>
                @foreach ($agama as $item)
                    <option value="{{ $item->id }}">{{ $item->agama }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="alamat">Alamat</label>
              <textarea type="text" name="alamat" id="alamat" class="form-control" cols="30" rows="5" value="{{ old('alamat') }}"></textarea>
            </div>
        </div>
      </div>
    </div>
    {{-- Akhir card 1 --}}

    {{-- Awal card 2 --}}
    <div class="col-md-6">
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="rt">RT</label>
              <input type="text" class="form-control col-md-4" id="rt" name="rt" value="{{ old('rt') }}">
            </div>
            <div class="form-group">
              <label for="rw">RW</label>
              <input type="text" name="rw" id="rw" class="form-control col-md-4" value="{{ old('rw') }}">
            </div>
            <div class="form-group">
              <label for="dusun">Dusun</label>
              <input type="text" name="dusun" id="dusun" class="form-control" value="{{ old('dusun') }}">
            </div>
            <div class="form-group">
              <label for="desa_kelurahan">Desa/Kelurahan</label>
              <input type="text" name="desa_kelurahan" id="desa_kelurahan" class="form-control" value="{{ old('desa_kelurahan') }}">
            </div>
            <div class="form-group">
              <label for="kecamatan">Kecamatan</label>
              <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="{{ old('kecamatan') }}">
            </div>
            <div class="form-group">
              <label for="kode_pos">Kode Pos</label>
              <input type="text" class="form-control col-md-6" id="kode_pos" name="kode_pos" value="{{ old('kode_pos') }}">
            </div>
            <div class="form-group">
              <label for="kabupaten">Kabupaten</label>
              <input type="text" name="kabupaten" id="kabupaten" class="form-control" value="{{ old('kabupaten') }}">
            </div>
        </div>
      </div>
    </div>
    {{-- Akhir card 2 --}}
  </div>
  {{-- Akhir baris kedua --}}

  {{-- Awal baris ketiga --}}
  <div class="row">
    {{-- Awal Card 1 --}}
    <div class="col-md-6">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body" style="padding-bottom: 105px;">
            <div class="form-group">
              <label for="id_tempat_tinggal">Tempat Tinggal</label>
              <select name="id_tempat_tinggal" id="id_tempat_tinggal" class="form-control col-md-6">
                <option value="" disabled selected>--Pilihan--</option>
                @foreach ($tempatTinggal as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_tempat_tinggal }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_transportasi">Moda Transportasi</label>
              <select name="id_transportasi" id="id_transportasi" class="form-control col-md-6">
                <option value="" disabled selected>--Pilihan--</option>
                @foreach ($modaTransportasi as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_moda }}</option>
                @endforeach
              </select>
            </div>
        </div>
      </div>
    </div>
    {{-- Akhir Card 1 --}}

    {{-- Awal Card 2 --}}
    <div class="col-md-6">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="punya_kip">Punya KIP?</label>
              <select name="punya_kip" id="punya_kip" class="form-control col-md-3">
                <option value="" disabled selected>--Pilihan--</option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
              </select>
            </div>
            <div class="form-group">
              <label for="no_kip">No. KIP</label>
              <input type="text" class="form-control" id="no_kip" name="no_kip" value="{{ old('no_kip') }}" disabled>
            </div>
            <div class="form-group">
              <label for="nama_pada_kip">Nama Pada KIP</label>
              <input type="text" name="nama_pada_kip" id="nama_pada_kip" class="form-control" value="{{ old('nama_pada_kip') }}" disabled>
            </div>
            {{--  --}}
        </div>
      </div>
    </div>
    {{-- Akhir Card 2 --}}
  </div>
  {{-- Akhir baris ketiga --}}

  {{-- Awal baris keempat --}}
  <div class="row">
    {{-- Awal Card 1 --}}
    <div class="col-md-6">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama_ayah_kandung">Nama Ayah Kandung</label>
              <input type="text" name="nama_ayah_kandung" id="nama_ayah_kandung" class="form-control" value="{{ old('nama_ayah_kandung') }}">
            </div>
            <div class="form-group">
              <label for="nik_ayah">NIK Ayah</label>
              <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" value="{{ old('nik_ayah') }}">
            </div>
            <div class="form-group">
              <label for="tahun_lahir_ayah">Tahun Lahir Ayah</label>
              <input type="text" class="form-control col-md-6" id="tahun_lahir_ayah" name="tahun_lahir_ayah" value="{{ old('tahun_lahir_ayah') }}">
            </div>
            <div class="form-group">
              <label for="id_pendidikan_ayah">Pendidikan Ayah</label>
              <select name="id_pendidikan_ayah" id="id_pendidikan_ayah" class="form-control col-md-6">
                <option value="">--Pilihan--</option>
                @foreach ($pendidikan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_pendidikan }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_pekerjaan_ayah">Pekerjaan Ayah</label>
              <select name="id_pekerjaan_ayah" id="id_pekerjaan_ayah" class="form-control col-md-6">
                <option value="" selected disabled>--Pilihan--</option>
                @foreach ($pekerjaan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_penghasilan_ayah">Penghasilan Ayah</label>
              <select name="id_penghasilan_ayah" id="id_penghasilan_ayah" class="form-control col-md-6">
                <option value="" selected disabled>--Pilihan--</option>
                @foreach ($penghasilan as $item)
                    <option value="{{ $item->id }}">{{ $item->jumlah_penghasilan }}</option>
                @endforeach
              </select>
            </div>
        </div>
      </div>
    </div>
    {{-- Akhir Card 1 --}}

    {{-- Awal Card 2 --}}
    <div class="col-md-6">
      <div class="card card-warning">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
              <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" class="form-control">
            </div>
            <div class="form-group">
              <label for="nik_ibu">NIK Ibu</label>
              <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="{{ old('nik_ibu') }}">
            </div>
            <div class="form-group">
              <label for="tahun_lahir_ibu">Tahun Lahir Ibu</label>
              <input type="text" name="tahun_lahir_ibu" id="tahun_lahir_ibu" class="form-control col-md-6" value="{{ old('tahun_lahir_ibu') }}">
            </div>
            <div class="form-group">
              <label for="id_pendidikan_ibu">Pendidikan Ibu</label>
              <select name="id_pendidikan_ibu" id="id_pendidikan_ibu" class="form-control col-md-6">
                <option value="" disabled selected>--Pilihan--</option>
                @foreach ($pendidikan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_pendidikan }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_pekerjaan_ibu">Pekerjaan Ibu</label>
              <select name="id_pekerjaan_ibu" id="id_pekerjaan_ibu" class="form-control col-md-6">
                <option value="" disabled selected>--Pilihan--</option>
                @foreach ($pekerjaan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_penghasilan_ibu">Penghasilan Ibu</label>
              <select name="id_penghasilan_ibu" id="id_penghasilan_ibu" class="form-control col-md-6">
                <option value="" selected disabled>--Pilihan--</option>
                @foreach ($penghasilan as $item)
                    <option value="{{ $item->id }}">{{ $item->jumlah_penghasilan }}</option>
                @endforeach
              </select>
            </div>
        </div>
      </div>
    </div>
    {{-- Akhir Card 2 --}}
  </div>
  {{-- Akhir baris keempat --}}

  {{-- Awal baris kelima --}}
  <div class="row">

    {{-- Awal Card 1 --}}
    <div class="col-md-6">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body" style="padding-bottom: 100px;">
            <p><i>*kosongkan jika tidak mempunyai wali</i></p>
            <div class="form-group">
              <label for="nama_wali">Nama Wali</label>
              <input type="text" name="nama_wali" id="nama_wali" class="form-control">
            </div>
            <div class="form-group">
              <label for="nik_wali">NIK Wali</label>
              <input type="text" class="form-control" id="nik_wali" name="nik_wali" value="{{ old('nik_wali') }}">
            </div>
            <div class="form-group">
              <label for="tahun_lahir_wali">Tahun Lahir Wali</label>
              <input type="text" name="tahun_lahir_wali" id="tahun_lahir_wali" class="form-control col-md-6" value="{{ old('tahun_lahir_wali') }}">
            </div>
            <div class="form-group">
              <label for="id_pendidikan_wali">Pendidikan Wali</label>
              <select name="id_pendidikan_wali" id="id_pendidikan_wali" class="form-control col-md-6">
                <option value="" selected>--Pilihan--</option>
                @foreach ($pendidikan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_pendidikan }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_pekerjaan_wali">Pekerjaan Wali</label>
              <select name="id_pekerjaan_wali" id="id_pekerjaan_wali" class="form-control col-md-6">
                <option value="" selected>--Pilihan--</option>
                @foreach ($pekerjaan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="id_penghasilan_wali">Penghasilan Wali</label>
              <select name="id_penghasilan_wali" id="id_penghasilan_wali" class="form-control col-md-6">
                <option value="" selected>--Pilihan--</option>
                @foreach ($penghasilan as $item)
                    <option value="{{ $item->id }}">{{ $item->jumlah_penghasilan }}</option>
                @endforeach
              </select>
            </div>
        </div>
      </div>
    </div>
    {{-- Akhir Card 1 --}}

    {{-- Awal Card 2 --}}
    <div class="col-md-6">
      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="no_telepon_rumah">No. Telepon Rumah</label>
              <input type="text" name="no_telepon_rumah" id="no_telepon_rumah" class="form-control">
            </div>
            <div class="form-group">
              <label for="no_telepon">No. Telepon (HP)</label>
              <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon') }}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
        </div>
      </div>

      <div class="card card-dark">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="tinggi_badan">Tinggi Badan</label>
              <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control col-md-6" value="{{ old('tinggi_badan') }}">
            </div>
            <div class="form-group">
              <label for="berat_badan">Berat Badan</label>
              <input type="text" class="form-control col-md-6" id="berat_badan" name="berat_badan" value="{{ old('berat_badan') }}">
            </div>
            <div class="form-group">
              <label for="lingkar_kepala">Lingkar Kepala</label>
              <input type="text" name="lingkar_kepala" id="lingkar_kepala" class="form-control col-md-6" value="{{ old('lingkar_kepala') }}">
            </div>
        </div>
      </div>
    </div>
    {{-- Akhir Card 2 --}}
  </div>
  {{-- Akhir baris kelima --}}

  {{-- Awal baris keenam --}}
  <div class="row">
    {{-- Awal Card 1 --}}
    <div class="col-md-6">
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body" style="padding-bottom: 190px;">
            <div class="form-group">
              <label for="jarak_rumah_ke_sekolah">Jarak Rumah Ke Sekolah</label>
              <input type="text" name="jarak_rumah_ke_sekolah" id="jarak_rumah_ke_sekolah" class="form-control col-md-6" value="{{ old('jarak_rumah_ke_sekolah') }}">
            </div>
            <div class="form-group">
              <label for="waktu_tempuh">Waktu Tempuh</label>
              <input type="text" class="form-control col-md-6" id="waktu_tempuh" name="waktu_tempuh" value="{{ old('waktu_tempuh') }}">
            </div>
            <div class="form-group">
              <label for="anak_ke">Anak Ke</label>
              <input type="text" name="anak_ke" id="anak_ke" class="form-control col-md-6" value="{{ old('anak_ke') }}">
            </div>
            <div class="form-group">
              <label for="jumlah_saudara_kandung">Jumlah Saudara Kandung</label>
              <input type="text" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" class="form-control col-md-6" value="{{ old('jumlah_saudara_kandung') }}">
            </div>
        </div>
      </div>
    </div>
    {{-- Akhir Card 1 --}}

    {{-- Awal Card 2 --}}
    <div class="col-md-6">
      <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="jenis_prestasi">Jenis Prestasi</label>
              <input type="text" name="jenis_prestasi" id="jenis_prestasi" class="form-control" value="{{ old('jenis_prestasi') }}">
            </div>
            <div class="form-group">
              <label for="tingkat_prestasi">Tingkat Prestasi</label>
              <input type="text" class="form-control" id="tingkat_prestasi" name="tingkat_prestasi" value="{{ old('tingkat_prestasi') }}">
            </div>
            <div class="form-group">
              <label for="nama_prestasi">Nama Prestasi</label>
              <input type="text" name="nama_prestasi" id="nama_prestasi" class="form-control" value="{{ old('nama_prestasi') }}">
            </div>
            <div class="form-group">
              <label for="tahun_prestasi">Tahun Prestasi</label>
              <input type="text" name="tahun_prestasi" id="tahun_prestasi" class="form-control col-md-6" value="{{ old('tahun_prestasi') }}">
            </div>
            <div class="form-group">
              <label for="penyelenggara">Penyelenggara</label>
              <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" value="{{ old('penyelenggara') }}">
            </div>
            <div class="form-group">
              <label for="peringkat">Peringkat</label>
              <input type="text" name="peringkat" id="peringkat" class="form-control col-md-6" value="{{ old('peringkat') }}">
            </div>
        </div>
      </div>
    </div>
    {{-- Akhir Card 2 --}}
  </div>
  {{-- Akhir baris keenam --}}


  <!-- Modal list asal sekolah-->
  <div class="modal fade" id="modalListAsalSekolah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Pilih Asal Sekolah
                <button id="btnTambahData" type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAsalSekolah">
                  <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data Sekolah
                </button>
              </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
          <div class="container-fluid">
            {{-- Datatable --}}
            <table id="datatable" class="dataTable table table-bordered table-striped" role="grid">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>NPSN</th>
                      <th>Nama Sekolah</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
                  <tr>
                      <th>#</th>
                      <th>NPSN</th>
                      <th>Nama Sekolah</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                  </tr>
              </tfoot>
            </table>
            {{-- End of Datatable --}}
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Akhir modal list asal sekolah --}}

 
  
  {{-- Awal baris ketujuh --}}
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
          <div class="card-body">
            <div class="form-group">
              <label for="id_asal_sekolah">Asal Sekolah</label>
              <div class="row">
                <div class="col-7">
                  {{-- <select name="id_asal_sekolah" id="id_asal_sekolah" class="form-control">
                    <option disabled selected>--Pilihan--</option>
                    @foreach ($asalSekolah as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_sekolah }}</option>
                    @endforeach
                  </select> --}}
                  <input type="hidden" name="id_asal_sekolah" id="id_asal_sekolah" value="">
                  <input type="text" class="form-control" id="nama_asal_sekolah" value="">
                </div>
                <div class="col">
                  <button type="button" class="btn btn-primary btn-md" type="button" data-toggle="modal" data-target="#modalListAsalSekolah">Pilih Asal Sekolah</button>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="no_peserta_un">No. Peserta UN</label>
              <input type="text" class="form-control" id="no_peserta_un" name="no_peserta_un" value="{{ old('no_peserta_un') }}">
            </div>
            <div class="form-group">
              <label for="no_seri_ijazah">No. Seri Ijazah</label>
              <input type="text" name="no_seri_ijazah" id="no_seri_ijazah" class="form-control" value="{{ old('no_seri_ijazah') }}">
            </div>
            <div class="form-group">
              <label for="no_seri_skhun">No. Seri SKHUN</label>
              <input type="text" name="no_seri_skhun" id="no_seri_skhun" class="form-control">
            </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Akhir baris ketujuh --}}

  {{-- Awal baris kedelapan --}}
  <div class="row mb-5">
    <div class="col-md-10 mx-auto">
      <button href="{{ route('ppdb.store') }}" type="submit" id="btnSimpan"class="btn btn-lg btn-block btn-success"><span class="fa fa-save"></span> Simpan</button>
    </div>
  </div>
  {{-- Akhir baris kedelapan --}}
</form>

 {{-- Modal tambah dan edit data asal sekolah --}}
 <div class="modal fade" id="modalAsalSekolah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle">Tambah Data Asal Sekolah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="asalSekolahForm">
        @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="NPSN">NPSN</label>
                <input type="text" name="npsn" id="npsn" class="form-control col-md-4" required>
              </div>
              <div class="form-group">
                <label for="nama_sekolah">Nama Asal Sekolah</label>
                <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control col-md-8" required>
              </div>
              <div class="form-group">
                <label for="alamat_asal_sekolah">Alamat Sekolah</label>
                <textarea name="alamat_asal_sekolah" id="alamat_asal_sekolah" cols="30" rows="5" class="form-control"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="reset" id ="btnBatal" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" id="btnSimpanAsalSekolah" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>
{{-- Akhir modal tambah dan edit data asal sekolah --}}
@endsection

@push('scripts')
    {{-- Datatable script --}}
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.flash.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"> </script>

    {{-- SweetAlert2 script --}}
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.all.js') }}"> </script>

    {{-- MyScript --}}
    <script src="{{ asset('js/tambahPendaftar.js') }}"> </script>

    <script type="text/javascript">
      $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        ajax: "{{ url('/asal_sekolah/data2') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'npsn', name: 'npsn'},
            {data: 'nama_sekolah', name: 'nama_sekolah'},
            {data: 'alamat', name: 'alamat'},
            {data: 'aksi', name: 'aksi'}
        ]
      })
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush