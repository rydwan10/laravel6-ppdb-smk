@extends('template.default')
@section('page_title', 'Manajemen Asal Sekolah')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="box-body table-responsive">
                <button id="btnTambahData" type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalAsalSekolah">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data Sekolah
                  </button>
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
            </div>
        </div>
    </div>

    {{-- Modal Tambah dan edit Data --}}
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
                  <button type="submit" id="btnSimpan" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
        </div>
    </div>
    {{-- End of Modal --}}

    {{-- Modal Detail --}}
    <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-detail-title">Detail Sekolah</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <div class="modal-body">
            <div class="container-fluid" id="detailContainer">
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    {{-- End of Modal --}}
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.flash.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"> </script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"> </script>

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
            ajax: "{{ url('/asal_sekolah/data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'npsn', name: 'npsn'},
                {data: 'nama_sekolah', name: 'nama_sekolah'},
                {data: 'alamat', name: 'alamat'},
                {data: 'aksi', name: 'aksi'}
            ]
        })
    </script>
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.all.js') }}"> </script>
    <script type="text/javascript" src="{{ asset('js/asalSekolah.js') }}"></script>
@endpush

