<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('klorofil/assets/img/logo-smkn-btkl.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition"><div class="os-resize-observer-host"><div class="os-resize-observer observed" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer observed"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 179px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('images/default.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-header">DASHBOARD</li>

             <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                   <i class="nav-icon fas fa-tachometer-alt"></i>
                   <p>Dashboard</p>
              </a>
         </li>
        
         <li class="nav-item ">
              <a href="{{ url('/ppdb') }}" class="nav-link {{ request()->routeIs('ppdb.index') ? 'active' : '' }}">
                   <i class="nav-icon fas fa-user-friends"></i>
                   <p>List Pendaftar</p>
              </a>
         </li>

         <li class="nav-item ">
              <a href="{{ url('/ppdb/create') }}" class="nav-link {{ request()->routeIs('ppdb.create') ? 'active' : '' }}">
                   <i class="nav-icon fas fa-user-plus"></i>
                   <p>Tambah Pendaftar</p>
              </a>
         </li>
         <li class="nav-header">MANAJEMEN</li>
         {{-- Collapsible Nav Menu --}}
         {{-- <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tree"></i>
                <p>
                 Menu Manajemen
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="display: none;">
                <li class="nav-item">
                  <a href="../UI/general.html" class="nav-link">
                    <i class="fas fa-book nav-icon"></i>
                    <p>Agama</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../UI/icons.html" class="nav-link">
                    <i class="fas fa-school nav-icon"></i>
                    <p>Asal Sekolah</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../UI/buttons.html" class="nav-link">
                    <i class="fas fa-road nav-icon"></i>
                    <p>Jalur</p>
                  </a>
                </li>
                <li class="nav-item">
                   <a href="../UI/buttons.html" class="nav-link">
                     <i class="fas fa-circle nav-icon"></i>
                     <p>Jurusan</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="../UI/buttons.html" class="nav-link">
                     <i class="fas fa-th nav-icon"></i>
                     <p>Pekerjaan</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="../UI/buttons.html" class="nav-link">
                     <i class="fas fa-graduation-cap nav-icon"></i>
                     <p>Pendidikan</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="../UI/buttons.html" class="nav-link">
                     <i class="fa fa-copy nav-icon"></i>
                     <p>Penghasilan</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="../UI/buttons.html" class="nav-link">
                     <i class="fas fa-home nav-icon"></i>
                     <p>Tempat Tinggal</p>
                   </a>
                 </li>
                 <li class="nav-item">
                   <a href="../UI/buttons.html" class="nav-link">
                     <i class="fas fa-car nav-icon"></i>
                     <p>Transportasi</p>
                   </a>
                 </li>
              </ul>
        </li> --}}
        <li class="nav-item">
          <a href="{{ route('asal_sekolah.index') }}" class="nav-link {{ request()->routeIs('asal_sekolah.index') ? 'active' : '' }}">
            <i class="fas fa-school nav-icon"></i>
            <p>Asal Sekolah</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ request()->routeIs('petugas.index') ? 'active' : '' }}">
            <i class="fas fa-users nav-icon"></i>
            <p>Petugas</p>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 16.9173%; transform: translate(0px, 8.75339px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
  <!-- /.sidebar -->
</aside>