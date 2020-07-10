@extends('template.default')
@section('page_title', 'Edit Data Pendaftar')
@section('content')

<form action="{{ route('ppdb.update', ['id' => $siswa->id]) }}" id="form-edit" method="PUT">
  @csrf
{{-- Awal baris pertama --}}
<input type="hidden" name="id" value="{{ $siswa->id }}">
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
            <input type="text" class="form-control col-md-6" id="no_daftar" name="no_daftar" value="{{ $siswa->no_daftar }}">
          </div>
          <div class="form-group">
            <label for="id_jalur">Jalur</label>
            <select name="id_jalur" id="id_jalur" class="form-control col-md-6">
            {{-- <option value="{{ $siswa->id_jalur }}">{{ $siswa->nama_jalur }}</option> --}}
                @foreach ($jalur as $item)
                    <option value="{{ $item->id }}" {{ $siswa->id_jalur == $item->id ? 'selected' : '' }}>{{ $item->nama_jalur }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="id_pilihan_jurusan_satu">Pilihan Jurusan 1</label>
            <select name="id_pilihan_jurusan_satu" id="id_pilihan_jurusan_satu" class="form-control">
              {{-- <option value="" disabled selected>--Pilihan--</option> --}}
                @foreach ($jurusan as $item)
                    <option value="{{ $item->id }}" {{ $siswa->id_pilihan_jurusan_satu == $item->id ? 'selected' : '' }}>{{ $item->nama_jurusan }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="id_pilihan_jurusan_dua">Pilihan Jurusan 2</label>
            <select name="id_pilihan_jurusan_dua" id="id_pilihan_jurusan_dua" class="form-control">
              {{-- <option value="" disabled selected>--Pilihan--</option> --}}
                @foreach ($jurusan as $item)
                    <option value="{{ $item->id }}" {{ $siswa->id_pilihan_jurusan_dua == $item->id ? 'selected' : '' }}>{{ $item->nama_jurusan }}</option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="id_pilihan_jurusan_tiga">Pilihan Jurusan 3</label>
            <select name="id_pilihan_jurusan_tiga" id="id_pilihan_jurusan_tiga" class="form-control">
              {{-- <option value="" disabled selected>--Pilihan--</option> --}}
                @foreach ($jurusan as $item)
                    <option value="{{ $item->id }}" {{ $siswa->id_pilihan_jurusan_tiga == $item->id ? 'selected' : '' }}>{{ $item->nama_jurusan }}</option>
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
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $siswa->nama_lengkap }}">
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control col-md-6">
               {{-- <option value="" disabled selected>--Pilihan--</option> --}}
                @if($siswa->jenis_kelamin == 'Laki-laki')
                    <option value="Laki-laki" selected>Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                @else
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan" selected>Perempuan</option>
                @endif
            </select>
          </div>
          <div class="form-group">
            <label for="nisn">NISN</label>
            <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $siswa->nisn }}">
          </div>
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" class="form-control" value="{{ $siswa->nik }}">
          </div>
          <div class="form-group">
            <label for="no_kartu_keluarga">No. Kartu Keluarga</label>
            <input type="text" name="no_kartu_keluarga" id="no_kartu_keluarga" class="form-control" value="{{ $siswa->no_kartu_keluarga }}">
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
            <input type="text" class="form-control" id="no_reg_akta_kelahiran" name="no_reg_akta_kelahiran" value="{{ $siswa->no_reg_akta_kelahiran }}">
          </div>
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" value="{{ $siswa->tempat_lahir }}">
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control col-md-6" value="{{ $siswa->tanggal_lahir }}">
          </div>
          <div class="form-group">
            <label for="id_agama">Agama</label>
            <select name="id_agama" id="id_agama" class="form-control col-md-6">
              {{-- <option value="" disabled selected>--Pilihan--</option> --}}
              @foreach ($agama as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_agama == $item->id ? 'selected' : '' }}>{{ $item->agama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea type="text" name="alamat" id="alamat" class="form-control" cols="30" rows="5" value="">{{ $siswa->alamat }}</textarea>
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
            <input type="text" class="form-control col-md-4" id="rt" name="rt" value="{{ $siswa->rt }}">
          </div>
          <div class="form-group">
            <label for="rw">RW</label>
            <input type="text" name="rw" id="rw" class="form-control col-md-4" value="{{ $siswa->rw }}">
          </div>
          <div class="form-group">
            <label for="dusun">Dusun</label>
            <input type="text" name="dusun" id="dusun" class="form-control" value="{{ $siswa->dusun }}">
          </div>
          <div class="form-group">
            <label for="desa_kelurahan">Desa/Kelurahan</label>
            <input type="text" name="desa_kelurahan" id="desa_kelurahan" class="form-control" value="{{ $siswa->desa_kelurahan }}">
          </div>
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" name="kecamatan" id="kecamatan" class="form-control" value="{{ $siswa->kecamatan }}">
          </div>
          <div class="form-group">
            <label for="kode_pos">Kode Pos</label>
            <input type="text" class="form-control col-md-6" id="kode_pos" name="kode_pos" value="{{ $siswa->kode_pos }}">
          </div>
          <div class="form-group">
            <label for="kabupaten">Kabupaten</label>
            <input type="text" name="kabupaten" id="kabupaten" class="form-control" value="{{ $siswa->kabupaten }}">
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
              {{-- <option value="" disabled selected>--Pilihan--</option> --}}
              @foreach ($tempatTinggal as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_tempat_tinggal == $item->id ? 'selected' : '' }}>{{ $item->nama_tempat_tinggal }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="id_transportasi">Moda Transportasi</label>
            <select name="id_transportasi" id="id_transportasi" class="form-control col-md-6">
              {{-- <option value="" disabled selected>--Pilihan--</option> --}}
              @foreach ($modaTransportasi as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_transportasi == $item->id ? 'selected' : '' }}>{{ $item->nama_moda }}</option>
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
               {{-- <option value="" disabled selected>--Pilihan--</option> --}}
               @if($siswa->punya_kip == 'Ya')
                    <option value="Ya" selected>Ya</option>
                    <option value="Tidak">Tidak</option>
               @else
                    <option value="Ya">Ya</option>
                    <option value="Tidak" selected>Tidak</option>
               @endif
            </select>
          </div>
          <div class="form-group">
            <label for="no_kip">No. KIP</label>
            <input type="text" class="form-control" id="no_kip" name="no_kip" value="{{ $siswa->no_kip == null ? '' : $siswa->no_kip }}" disabled>
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
            <input type="text" name="nama_ayah_kandung" id="nama_ayah_kandung" class="form-control" value="{{ $siswa->nama_ayah_kandung }}">
          </div>
          <div class="form-group">
            <label for="nik_ayah">NIK Ayah</label>
            <input type="text" name="nik_ayah" id="nik_ayah" class="form-control" value="{{ $siswa->nik_ayah }}">
          </div>
          <div class="form-group">
            <label for="tahun_lahir_ayah">Tahun Lahir Ayah</label>
            <input type="text" class="form-control col-md-6" id="tahun_lahir_ayah" name="tahun_lahir_ayah" value="{{ $siswa->tahun_lahir_ayah }}">
          </div>
          <div class="form-group">
            <label for="id_pendidikan_ayah">Pendidikan Ayah</label>
            <select name="id_pendidikan_ayah" id="id_pendidikan_ayah" class="form-control col-md-6">
              {{-- <option value="">--Pilihan--</option> --}}
              @foreach ($pendidikan as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_pendidikan_ayah == $item->id ? 'selected' : '' }}>{{ $item->nama_pendidikan }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="id_pekerjaan_ayah">Pekerjaan Ayah</label>
            <select name="id_pekerjaan_ayah" id="id_pekerjaan_ayah" class="form-control col-md-6">
              {{-- <option value="" selected disabled>--Pilihan--</option> --}}
              @foreach ($pekerjaan as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_pekerjaan_ayah == $item->id ? 'selected' : '' }}>{{ $item->nama_pekerjaan }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="id_penghasilan_ayah">Penghasilan Ayah</label>
            <select name="id_penghasilan_ayah" id="id_penghasilan_ayah" class="form-control col-md-6">
              {{-- <option value="" selected disabled>--Pilihan--</option> --}}
              @foreach ($penghasilan as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_penghasilan_ayah == $item->id ? 'selected' : '' }}>{{ $item->jumlah_penghasilan }}</option>
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
            <input type="text" name="nama_ibu_kandung" id="nama_ibu_kandung" class="form-control" value="{{ $siswa->nama_ibu_kandung }}">
          </div>
          <div class="form-group">
            <label for="nik_ibu">NIK Ibu</label>
            <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" value="{{ $siswa->nik_ibu }}">
          </div>
          <div class="form-group">
            <label for="tahun_lahir_ibu">Tahun Lahir Ibu</label>
            <input type="text" name="tahun_lahir_ibu" id="tahun_lahir_ibu" class="form-control col-md-6" value="{{ $siswa->tahun_lahir_ibu }}">
          </div>
          <div class="form-group">
            <label for="id_pendidikan_ibu">Pendidikan Ibu</label>
            <select name="id_pendidikan_ibu" id="id_pendidikan_ibu" class="form-control col-md-6">
              {{-- <option value="" disabled selected>--Pilihan--</option> --}}
              @foreach ($pendidikan as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_pendidikan_ibu == $item->id ? 'selected' : '' }}>{{ $item->nama_pendidikan }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="id_pekerjaan_ibu">Pekerjaan Ibu</label>
            <select name="id_pekerjaan_ibu" id="id_pekerjaan_ibu" class="form-control col-md-6">
              {{-- <option value="" disabled selected>--Pilihan--</option> --}}
              @foreach ($pekerjaan as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_pekerjaan_ibu == $item->id ? 'selected' : '' }}>{{ $item->nama_pekerjaan }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="id_penghasilan_ibu">Penghasilan Ibu</label>
            <select name="id_penghasilan_ibu" id="id_penghasilan_ibu" class="form-control col-md-6">
              {{-- <option value="" selected disabled>--Pilihan--</option> --}}
              @foreach ($penghasilan as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_penghasilan_ibu == $item->id ? 'selected' : '' }}>{{ $item->jumlah_penghasilan }}</option>
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
            <input type="text" name="nama_wali" id="nama_wali" class="form-control" value="{{ $siswa->nama_wali == null ? '' : $siswa->nama_wali}}">
          </div>
          <div class="form-group">
            <label for="nik_wali">NIK Wali</label>
            <input type="text" class="form-control" id="nik_wali" name="nik_wali" value="{{ $siswa->nik_wali == null ? '' : $siswa->nik_wali }}">
          </div>
          <div class="form-group">
            <label for="tahun_lahir_wali">Tahun Lahir Wali</label>
            <input type="text" name="tahun_lahir_wali" id="tahun_lahir_wali" class="form-control col-md-6" value="{{ $siswa->tahun_lahir_wali == null ? '' : $siswa->tahun_lahir_wali }}">
          </div>
          <div class="form-group">
            <label for="id_pendidikan_wali">Pendidikan Wali</label>
            <select name="id_pendidikan_wali" id="id_pendidikan_wali" class="form-control col-md-6">
                @if($siswa->id_pendidikan_wali == !null)
                    <option value="">--Pilihan--</option>
                    @foreach ($pendidikan as $item)
                        <option value="{{ $item->id }}" {{ $siswa->id_pendidikan_wali == $item->id ? 'selected' : '' }}>{{ $item->nama_pendidikan }}</option>
                    @endforeach
                @else
                    <option value="" selected>--Pilihan--</option>
                    @foreach ($pendidikan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_pendidikan }}</option>
                    @endforeach
                @endif
            </select>
          </div>
          <div class="form-group">
            <label for="id_pekerjaan_wali">Pekerjaan Wali</label>
            <select name="id_pekerjaan_wali" id="id_pekerjaan_wali" class="form-control col-md-6">
                @if($siswa->id_pekerjaan_wali == !null)
                    <option value="">--Pilihan--</option>
                    @foreach ($pekerjaan as $item)
                        <option value="{{ $item->id }}" {{ $siswa->id_pekerjaan_wali == $item->id ? 'selected' : '' }}>{{ $item->nama_pekerjaan }}</option>
                    @endforeach
                @else
                    <option value="" selected>--Pilihan--</option>
                    @foreach ($pekerjaan as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_pekerjaan }}</option>
                    @endforeach
                @endif
            </select>
          </div>
          <div class="form-group">
            <label for="id_penghasilan_wali">Penghasilan Wali</label>
            <select name="id_penghasilan_wali" id="id_penghasilan_wali" class="form-control col-md-6">
                @if($siswa->id_penghasilan_wali == !null)
                    <option value="">--Pilihan--</option>
                    @foreach ($penghasilan as $item)
                        <option value="{{ $item->id }}" {{ $siswa->id_penghasilan_wali == $item->id ? 'selected' : '' }}>{{ $item->jumlah_penghasilan }}</option>
                    @endforeach
                @else
                    <option value="" selected>--Pilihan--</option>
                    @foreach ($penghasilan as $item)
                        <option value="{{ $item->id }}">{{ $item->jumlah_penghasilan }}</option>
                    @endforeach
                @endif
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
            <input type="text" name="no_telepon_rumah" id="no_telepon_rumah" class="form-control" value="{{ $siswa->no_telepon_rumah == null ? '' : $siswa->no_telepon_rumah }}">
          </div>
          <div class="form-group">
            <label for="no_telepon">No. Telepon (HP)</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ $siswa->no_telepon == null ? '' : $siswa->no_telepon }}">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $siswa->email == null ? '' : $siswa->email }}">
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
            <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control col-md-6" value="{{ $siswa->tinggi_badan }}">
          </div>
          <div class="form-group">
            <label for="berat_badan">Berat Badan</label>
            <input type="text" class="form-control col-md-6" id="berat_badan" name="berat_badan" value="{{ $siswa->berat_badan }}">
          </div>
          <div class="form-group">
            <label for="lingkar_kepala">Lingkar Kepala</label>
            <input type="text" name="lingkar_kepala" id="lingkar_kepala" class="form-control col-md-6" value="{{ $siswa->lingkar_kepala }}">
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
            <input type="text" name="jarak_rumah_ke_sekolah" id="jarak_rumah_ke_sekolah" class="form-control col-md-6" value="{{ $siswa->jarak_rumah_ke_sekolah }}">
          </div>
          <div class="form-group">
            <label for="waktu_tempuh">Waktu Tempuh</label>
            <input type="text" class="form-control col-md-6" id="waktu_tempuh" name="waktu_tempuh" value="{{ $siswa->waktu_tempuh }}">
          </div>
          <div class="form-group">
            <label for="anak_ke">Anak Ke</label>
            <input type="text" name="anak_ke" id="anak_ke" class="form-control col-md-6" value="{{ $siswa->anak_ke }}">
          </div>
          <div class="form-group">
            <label for="jumlah_saudara_kandung">Jumlah Saudara Kandung</label>
            <input type="text" name="jumlah_saudara_kandung" id="jumlah_saudara_kandung" class="form-control col-md-6" value="{{ $siswa->jumlah_saudara_kandung }}">
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
            <input type="text" name="jenis_prestasi" id="jenis_prestasi" class="form-control" value="{{ $siswa->jenis_prestasi == null ? '' : $siswa->jenis_prestasi }}">
          </div>
          <div class="form-group">
            <label for="tingkat_prestasi">Tingkat Prestasi</label>
            <input type="text" class="form-control" id="tingkat_prestasi" name="tingkat_prestasi" value="{{ $siswa->tingkat_prestasi == null ? '' : $siswa->tingkat_prestasi }}">
          </div>
          <div class="form-group">
            <label for="nama_prestasi">Nama Prestasi</label>
            <input type="text" name="nama_prestasi" id="nama_prestasi" class="form-control" value="{{ $siswa->nama_prestasi == null ? '' : $siswa->nama_prestasi }}">
          </div>
          <div class="form-group">
            <label for="tahun_prestasi">Tahun Prestasi</label>
            <input type="text" name="tahun_prestasi" id="tahun_prestasi" class="form-control col-md-6" value="{{ $siswa->tahun_prestasi == null ? '' : $siswa->tahun_prestasi }}">
          </div>
          <div class="form-group">
            <label for="penyelenggara">Penyelenggara</label>
            <input type="text" name="penyelenggara" id="penyelenggara" class="form-control" value="{{ $siswa->penyelenggara == null ? '' : $siswa->penyelenggara }}">
          </div>
          <div class="form-group">
            <label for="peringkat">Peringkat</label>
            <input type="text" name="peringkat" id="peringkat" class="form-control col-md-6" value="{{ $siswa->peringkat == null ? '' : $siswa->peringkat }}">
          </div>
      </div>
    </div>
  </div>
  {{-- Akhir Card 2 --}}
</div>
{{-- Akhir baris keenam --}}

{{-- Awal baris ketujuh --}}
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"></h3>
      </div>
        <div class="card-body">
          <div class="form-group">
            <label for="id_asal_sekolah">Nama Asal Sekolah</label>
            <select name="id_asal_sekolah" id="id_asal_sekolah" class="form-control">
              {{-- <option disabled selected>--Pilihan--</option> --}}
              @foreach ($asalSekolah as $item)
                  <option value="{{ $item->id }}" {{ $siswa->id_asal_sekolah == $item->id ? 'selected' : '' }}>{{ $item->nama_sekolah }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="no_peserta_un">No. Peserta UN</label>
            <input type="text" class="form-control" id="no_peserta_un" name="no_peserta_un" value="{{ $siswa->no_peserta_un }}">
          </div>
          <div class="form-group">
            <label for="no_seri_ijazah">No. Seri Ijazah</label>
            <input type="text" name="no_seri_ijazah" id="no_seri_ijazah" class="form-control" value="{{ $siswa->no_seri_ijazah }}">
          </div>
          <div class="form-group">
            <label for="no_seri_skhun">No. Seri SKHUN</label>
            <input type="text" name="no_seri_skhun" id="no_seri_skhun" class="form-control" value="{{ $siswa->no_seri_skhun }}">
          </div>
      </div>
    </div>
  </div>
</div>
{{-- Akhir baris ketujuh --}}

{{-- Awal baris kedelapan --}}

  <div class="row justify-content-center mb-5">
      <ul class="list-group list-group-horizontal">
          <li class="list-group-item"><a href="{{ route('ppdb.show', $siswa->id) }}" class="btn btn-danger btn-md"><span class="fa fa-window-close"></span> Kembali dan Batalkan Perubahan</a></li>
          <li class="list-group-item"><button href="{{ route('ppdb.update', $siswa->id) }}" type="submit" id="btnEdit" data-id="{{ $siswa->id }}" class="btn btn-md btn-success"><span class="fa fa-edit"></span> Simpan Perubahan</button>
          <li class="list-group-item"><a href="{{ route('ppdb.index') }}" class="btn btn-md btn-info"><span class="fa fa-copy"></span> Kembali ke List Pendaftar</a>
          </li>
      </ul>
  </div>

{{-- Akhir baris kedelapan --}}
</form>
@endsection

@push('scripts')
<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.all.js') }}"> </script>
<script src="{{ asset('js/editPendaftar.js') }}"> </script>
@endpush

@push('styles')
@endpush