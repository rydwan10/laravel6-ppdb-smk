@extends('template.default')
@section('page_title', 'Dashboard')
@section('content')
    {{-- Start of summary --}}
    <div class="row">
      {{-- Left Column --}}
      <div class="col">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-broadcast-tower"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">TKJ</span>
                <span class="info-box-number">
                  {{ $jumlahTKJ }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-laptop"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">RPL</span>
                <span class="info-box-number">{{ $jumlahRPL }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
    
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
    
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-car"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">TKR</span>
                <span class="info-box-number">{{ $jumlahTKR }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-medkit"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">Farmasi</span>
                <span class="info-box-number">{{ $jumlahFarmasi }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
    
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-motorcycle"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">TSM</span>
                <span class="info-box-number">
                  {{ $jumlahTSM }}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bolt"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">Telin</span>
                <span class="info-box-number">{{ $jumlahTelin }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
    
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
    
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">AP</span>
                <span class="info-box-number">{{ $jumlahAP }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">Jumlah</span>
                <span class="info-box-number">{{  $jumlahCalonSiswa }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
    
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-male"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">Laki-laki</span>
                <span class="info-box-number">{{  $jumlahLakiLaki }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-female"></i></span>
    
              <div class="info-box-content">
                <span class="info-box-text">Perempuan</span>
                <span class="info-box-number">{{  $jumlahPerempuan }}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
    
        
      </div>

      {{-- Right Column --}}
      {{-- <div class="col-4 col-sm-6 col-md-3">
    
          <div class="card">
            <div class="card-header">
              <h6 class="card-title">Jumlah : <span class="text-bold">{{ $jumlahCalonSiswa }}</span></h6>
            </div>
            <div class="card-body">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-male"></i></span>
      
                <div class="info-box-content">
                  <span class="info-box-text">Laki-laki</span>
                  <span class="info-box-number">{{ $jumlahLakiLaki }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-female"></i></span>
      
                <div class="info-box-content">
                  <span class="info-box-text">Perempuan</span>
                  <span class="info-box-number">{{ $jumlahPerempuan }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          </div>
        </div> 
        
        <!-- /.col -->
      </div>
       --}}
    </div>
    {{-- End of summary --}}
@endsection