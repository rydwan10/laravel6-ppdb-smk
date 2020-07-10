<!DOCTYPE html>
<html lang="en">
<head>
    
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <title>PPDB_{{$siswa->nama_lengkap}}_{{$siswa->asal_sekolah}}</title>
    <style>
      /* @media print {
        a4
              body{
                  width: 21cm;
                  height: 29.7cm;
                  margin: 30mm 45mm 30mm 45mm; 
                  /* change the margins as you want them to be. */
                } 
              } */
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header p-2 bg-primary">
            <h3 class="pt-2 pb-3 card-title" style="font-size: 30px;">Data Lengkap <strong>{{ $siswa->nama_lengkap }}</strong></h3>
            <div class="float-right">
              <ul class="list-group list-group-horizontal">
                <li class="list-group-item text-dark">No. Daftar: <span class="btn btn-sm {{ $siswa->nama_jalur == 'Prestasi' ? 'btn-warning' : 'btn-primary' }}">{{ $siswa->no_daftar }}</span></li>
                <li class="list-group-item text-dark">Jalur: <span class="btn btn-sm {{ $siswa->nama_jalur == 'Prestasi' ? 'btn-warning' : 'btn-primary' }} btn-primary">{{ $siswa->nama_jalur }}</span></li>
              </ul>
            </div>
        </div>
        <div class="card-body">
        
    
          {{-- Pilihan Jurusan --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-circle"></i> Jurusan</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Pilihan Jurusan 1</p>
                  <hr >
                  <p class="text-bold">Pilihan Jurusan 2</p>
                  <hr >
                  <p class="text-bold">Pilihan Jurusan 3</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->pilihan_jurusan_satu }}</p>
                  <hr>
                  <p>{{ $siswa->pilihan_jurusan_dua }}</p>
                  <hr>  
                  <p>{{ $siswa->pilihan_jurusan_tiga }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
    
          {{-- Data Siswa --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-user"></i> Data Diri</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">NISN</p>
                  <hr >
                  <p class="text-bold">Nama Lengkap</p>
                  <hr >
                  <p class="text-bold">Jenis Kelamin</p>
                  <hr >
                  <p class="text-bold">NIK</p>
                  <hr >
                  <p class="text-bold">No. Kartu Keluarga</p>
                  <hr >
                  <p class="text-bold">No. Reg. Akta Kelahiran</p>
                  <hr >
                  <p class="text-bold">Tempat Lahir</p>
                  <hr >
                  <p class="text-bold">Tanggal Lahir</p>
                  <hr >
                  <p class="text-bold">Agama</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->nisn }}</p>
                  <hr>
                  <p>{{ $siswa->nama_lengkap }}</p>
                  <hr>  
                  <p>{{ $siswa->jenis_kelamin }}</p>
                  <hr>
                  <p>{{ $siswa->nik }}</p>
                  <hr>
                  <p>{{ $siswa->no_kartu_keluarga }}</p>
                  <hr>
                  <p>{{ $siswa->no_reg_akta_kelahiran }}</p>
                  <hr>
                  <p>{{ $siswa->tempat_lahir }}</p>
                  <hr>
                  <p>{{ $siswa->tanggal_lahir }}</p>
                  <hr>
                  <p>{{ $siswa->agama }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
    
          {{-- Alamat --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-home"></i> Alamat</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Alamat</p>
                  <hr >
                  <p class="text-bold">RT</p>
                  <hr >
                  <p class="text-bold">RW</p>
                  <hr >
                  <p class="text-bold">Dusun</p>
                  <hr >
                  <p class="text-bold">Desa/Kelurahan</p>
                  <hr >
                  <p class="text-bold">Kecamatan</p>
                  <hr >
                  <p class="text-bold">Kode Pos</p>
                  <hr >
                  <p class="text-bold">Kabupaten</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->alamat }}</p>
                  <hr>
                  <p>{{ $siswa->rt }}</p>
                  <hr>  
                  <p>{{ $siswa->rw }}</p>
                  <hr>
                  <p>{{ $siswa->dusun }}</p>
                  <hr>
                  <p>{{ $siswa->desa_kelurahan }}</p>
                  <hr>
                  <p>{{ $siswa->kecamatan }}</p>
                  <hr>
                  <p>{{ $siswa->kode_pos }}</p>
                  <hr>
                  <p>{{ $siswa->kabupaten }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
          <br>
    
          {{-- Tinggal bersama dan transportasi--}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-home"></i> <i class="fa fa-car"></i> Tempat Tinggal dan Transportasi</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Tempat Tinggal</p>
                  <hr >
                  <p class="text-bold">Transportasi</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->nama_tempat_tinggal }}</p>
                  <hr>
                  <p>{{ $siswa->nama_moda }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
    
          {{-- Kip --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-credit-card"></i> KIP (Kartu Indonesia Pintar)</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Punya KIP?</p>
                  <hr >
                  <p class="text-bold">No. KIP</p>
                  <hr >
                  <p class="text-bold">Nama Pada KIP</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->punya_kip }}</p>
                  <hr>
                  <p>{{ $siswa->no_kip == null ? '-' : $siswa->no_kip }}</p>
                  <hr>
                  <p>{{ $siswa->nama_pada_kip == null ? '-' : $siswa->nama_pada_kip }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
    
          {{-- Orang tua dan wali --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-user"></i> <i class="fa fa-user"></i> Orang Tua dan Wali</h6>
            </div>
              {{-- Ayah --}}
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Nama Ayah Kandung</p>
                  <hr >
                  <p class="text-bold">NIK Ayah</p>
                  <hr >
                  <p class="text-bold">Tahun Lahir Ayah</p>
                  <hr >
                  <p class="text-bold">Pendidikan Ayah</p>
                  <hr >
                  <p class="text-bold">Pekerjaan Ayah</p>
                  <hr >
                  <p class="text-bold">Penghasilan Ayah</p>
                  <hr>
                  <p class="text-bold">Nama Ibu Kandung</p>
                  <hr >
                  <p class="text-bold">NIK Ibu</p>
                  <hr >
                  <p class="text-bold">Tahun Lahir Ibu</p>
                  <hr >
                  <p class="text-bold">Pendidikan Ibu</p>
                  <hr >
                  <p class="text-bold">Pekerjaan Ibu</p>
                  <hr >
                  <p class="text-bold">Penghasilan Ibu</p>
                  <hr>
                  <p class="text-bold">Nama Wali</p>
                  <hr >
                  <p class="text-bold">NIK Wali</p>
                  <hr >
                  <p class="text-bold">Tahun Lahir Wali</p>
                  <hr >
                  <p class="text-bold">Pendidikan Wali</p>
                  <hr >
                  <p class="text-bold">Pekerjaan Wali</p>
                  <hr >
                  <p class="text-bold">Penghasilan Wali</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->nama_ayah_kandung }}</p>
                  <hr>
                  <p>{{ $siswa->nik_ayah }}</p>
                  <hr>  
                  <p>{{ $siswa->tahun_lahir_ayah }}</p>
                  <hr>
                  <p>{{ $siswa->pendidikan_ayah }}</p>
                  <hr>
                  <p>{{ $siswa->pekerjaan_ayah }}</p>
                  <hr>
                  <p>{{ $siswa->penghasilan_ayah }}</p>
                  <hr>
                  <p>{{ $siswa->nama_ibu_kandung }}</p>
                  <hr>
                  <p>{{ $siswa->nik_ibu }}</p>
                  <hr>  
                  <p>{{ $siswa->tahun_lahir_ibu }}</p>
                  <hr>
                  <p>{{ $siswa->pendidikan_ibu }}</p>
                  <hr>
                  <p>{{ $siswa->pekerjaan_ibu }}</p>
                  <hr>
                  <p>{{ $siswa->penghasilan_ibu }}</p>
                  <hr>
                  <p>{{ $siswa->nama_wali == null ? '-' : $siswa->nama_wali }}</p>
                  <hr>
                  <p>{{ $siswa->nik_wali == null ? '-' : $siswa->nik_wali}}</p>
                  <hr>  
                  <p>{{ $siswa->tahun_lahir_wali == null ? '-' : $siswa->tahun_lahir_wali }}</p>
                  <hr>
                  <p>{{ $siswa->pendidikan_wali == null ? '-' : $siswa->pendidikan_wali }}</p>
                  <hr>
                  <p>{{ $siswa->pekerjaan_wali == null ? '-' : $siswa->pekerjaan_wali }}</p>
                  <hr>
                  <p>{{ $siswa->penghasilan_wali == null ? '-' : $siswa->penghasilan_wali }}</p>
                </div>
              </div>
            </div>
          </div>
    
          {{-- Telepon dan email --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-phone"></i> <i class="fa fa-envelope"></i> Telepon dan Email</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">No. Telepon Rumah</p>
                  <hr >
                  <p class="text-bold">No. Telepon</p>
                  <hr >
                  <p class="text-bold">Email</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->no_telepon_rumah == null ? '-' : $siswa->no_telepon_rumah }}</p>
                  <hr>
                  <p>{{ $siswa->no_telepon == null ? '-' : $siswa->no_telepon }}</p>
                  <hr>
                  <p>{{ $siswa->email == null ? '-' : $siswa->email }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
    
          {{-- Data Fisik --}}
          <div class="card">
            <div class="card-header bg-primary">
              <div class="card-title"><i class="fa fa-male"></i> Data Fisik</div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Tinggi Badan</p>
                  <hr >
                  <p class="text-bold">Berat Badan</p>
                  <hr >
                  <p class="text-bold">Lingkar Kepala</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->tinggi_badan == null ? '-' : $siswa->tinggi_badan }} cm</p>
                  <hr>
                  <p>{{ $siswa->berat_badan == null ? '-' : $siswa->berat_badan }} cm</p>
                  <hr>
                  <p>{{ $siswa->lingkar_kepala == null ? '-' : $siswa->lingkar_kepala }} cm</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
    
          {{-- Jarak dan waktu tempuh --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-clock"></i> Jarak Ke Sekolah dan Waktu Tempuh</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Jarak Rumah ke Sekolah</p>
                  <hr >
                  <p class="text-bold">Waktu Tempuh</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->jarak_rumah_ke_sekolah == null ? '-' : $siswa->jarak_rumah_ke_sekolah }}</p>
                  <hr>
                  <p>{{ $siswa->waktu_tempuh == null ? '-' : $siswa->waktu_tempuh }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
    
          {{-- Anak ke dan jumlah saudara kandung --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-male"></i> <i class="fa fa-female"></i> Anak Ke dan Jumlah Saudara Kandung</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Anak Ke</p>
                  <hr >
                  <p class="text-bold">Jumlah Saudara Kandung</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->anak_ke == null ? '-' : $siswa->anak_ke }}</p>
                  <hr>
                  <p>{{ $siswa->jumlah_saudara_kandung == null ? '-' : $siswa->jumlah_saudara_kandung }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
    
          {{-- Prestasi --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-trophy"></i> Prestasi</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Jenis Prestasi</p>
                  <hr >
                  <p class="text-bold">Tingkat Prestasi</p>
                  <hr >
                  <p class="text-bold">Nama Prestasi</p>
                  <hr >
                  <p class="text-bold">Tahun Prestasi</p>
                  <hr >
                  <p class="text-bold">Penyelenggara</p>
                  <hr >
                  <p class="text-bold">Peringkat</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->jenis_prestasi == null ? '-' : $siswa->jenis_prestasi }}</p>
                  <hr>
                  <p>{{ $siswa->tingkat_prestasi == null ? '-' : $siswa->tingkat_prestasi }}</p>
                  <hr>  
                  <p>{{ $siswa->nama_prestasi == null ? '-' : $siswa->nama_prestasi }}</p>
                  <hr>
                  <p>{{ $siswa->tahun_prestasi == null ? '-' : $siswa->tahun_prestasi }}</p>
                  <hr>
                  <p>{{ $siswa->penyelenggara == null ? '-' : $siswa->penyelenggara }}</p>
                  <hr>
                  <p>{{ $siswa->peringkat == null ? '-' : $siswa->peringkat }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}
          <br>
          <br>
          <br>
    <br>
    <br>

          {{-- Asal sekolah dan kelengkapan ijazah --}}
          <div class="card">
            <div class="card-header bg-primary">
              <h6 class="card-title"><i class="fa fa-school"></i> <i class="fa fa-copy"></i> Asal Sekolah dan Kelengkapan Ijazah</h6>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-4">
                  <p class="text-bold">Asal Sekolah</p>
                  <hr >
                  <p class="text-bold">No. Peserta UN</p>
                  <hr >
                  <p class="text-bold">No. Seri Ijazah</p>
                  <hr >
                  <p class="text-bold">No. Seri SKHUN</p>
                </div>
                <div class="col">
                  <p>{{ $siswa->asal_sekolah == null ? '-' : $siswa->asal_sekolah }}</p>
                  <hr>
                  <p>{{ $siswa->no_peserta_un == null ? '-' : $siswa->no_peserta_un }}</p>
                  <hr>  
                  <p>{{ $siswa->no_seri_ijazah == null ? '-' : $siswa->no_seri_ijazah }}</p>
                  <hr>
                  <p>{{ $siswa->no_seri_skhun == null ? '-' : $siswa->no_seri_skhun }}</p>
                </div>
              </div>
            </div>
          </div>
          {{-- End --}}

        </div>
       
    </div>

    <script type="text/javascript">
      onload(window.print())
    </script>
</body>
</html>