
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fietsen Bouwer</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @yield('header')
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets')}}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('assets')}}/plugins/toastr/toastr.min.css">


  <!-- jQuery -->
    <script src="{{ asset('assets')}}/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" 
    integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          {{ auth()->user()->email }}
          <i class="fas fa-angle-down right"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="/logout" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{ asset('assets')}}/dist/img/Logo.jpeg" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Fietsen Bouwer</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('photo/' . auth()->user()->photo) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ request()->segment(1) == 'dashboard' ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
    
              </li>
              <li class="nav-item">
            <a href="/profile" 
            class="nav-link {{ request()->segment(1) == 'profile' ? 'active' : ''}}">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Profile
              </p>
            </a>
              </li>
              @if (auth()->user()->role == 'admin')

              <li class="nav-item">
            <a href="/user" class="nav-link {{ request()->segment(1) == 'user' ? 'active' : ''}}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
    
              </li>
              <!-- <li class="nav-item">
            <a href="/supplier" class="nav-link {{ request()->segment(1) == 'customer' ? 'active' : ''}}">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Supplier
              </p>
            </a>
    
              </li> -->
              <li class="nav-item">
            <a href="/barang" class="nav-link {{ request()->segment(1) == 'barang' ? 'active' : ''}}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Barang
              </p>
            </a>
              </li>

              </li>
              <li class="nav-item">
            <a href="/jasa-service" class="nav-link {{ request()->segment(1) == 'services' ? 'active' : ''}}">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Service
              </p>
            </a>
              </li>
              <li class="nav-item">
            <a href="/antrian/home" class="nav-link {{ request()->segment(1) == 'customer' ? 'active' : ''}}">
              <i class="nav-icon fas fa-child"></i>
              <p>
                Antrian
              </p>
            </a>
              </li>

              <li class="nav-item">
            <a href="/akun" class="nav-link {{ request()->segment(1) == 'akun' ? 'active' : ''}}">
              <i class="nav-icon fas fa-user-astronaut"></i>
              <p>
                Master Akun
              </p>
            </a>
              </li>

              @endif
              
              <li class="nav-item">
            <a href="/penjualan/{{ no_invoice() }}" 
            class="nav-link {{ request()->segment(1) == 'penjualan' ? 'active' : ''}}">
              <i class="nav-icon fas fa-cash-register"></i>
              <p>
                Penjualan
              </p>
            </a>
    
              </li>
              <li class="nav-item">
            <a href="/laporan" 
              class="nav-link {{ request()->segment(1) == 'laporan' ? 'active' : ''}}">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Laporan Penjualan Barang
              </p>
            </a>

            <a href="/jurnal" 
              class="nav-link {{ request()->segment(1) == 'jurnal' ? 'active' : ''}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Jurnal Umum
              </p>
            </a>
    
              </li>
              <li class="nav-item">
            <a href="/logout" class="nav-link ">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
    
              </li>
              
              
            </ul>
         
                 

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('konten')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Fietsen Bouwer &copy; 2023</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>


</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('assets')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('assets')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('assets')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('assets')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('assets')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets')}}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('assets')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('assets')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets')}}/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets')}}/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets')}}/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="{{ asset('assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="{{ asset('assets')}}/plugins/toastr/toastr.min.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#datatable").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>


</body>
</html>
