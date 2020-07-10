@extends('template.default')
@section('page_title', 'List Pendaftar')

@section('content')

<div class="card">
  
    <div class="card-body">
        <div class="box-body table-responsive">
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle mb-3 pl-5 pr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-print" aria-hidden="true"></i> Cetak Semua
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">PDF</a>
                  <a class="dropdown-item" href="#">Excel</a>
                  <a class="dropdown-item" href="#">CSV</a>
                </div>
              </div>
            <table id="datatable" class="dataTable table table-bordered table-striped" role="grid">
                <thead>
                    <tr role="row">
                        <th>#</th>
                        <th>No. Daftar</th>
                        <th>Nama Pendaftar</th>
                        <th>NISN</th>
                        <th>Asal Sekolah</th>
                        <th>Pilihan Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>No. Daftar</th>
                        <th>Nama Pendaftar</th>
                        <th>NISN</th>
                        <th>Asal Sekolah</th>
                        <th>Pilihan Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
  
</div>


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
            ajax: "{{ url('/ppdb/data') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'no_daftar', name: 'no_daftar'},
                {data: 'nama_lengkap', name: 'calon_siswa.nama_lengkap'},
                {data: 'nisn', name: 'calon_siswa.nisn'},
                {data: 'nama_sekolah', name: 'asal_sekolah.nama_sekolah'},
                {data: 'nama_jurusan', name: 'jurusan.nama_jurusan'},
                {data: 'aksi', name: 'aksi'}
            ]
        });

    </script>
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.all.js') }}"> </script>
    <script type="text/javascript" src="{{ asset('js/listPendaftar.js') }}"></script>

@endpush