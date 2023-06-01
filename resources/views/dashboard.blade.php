@extends('template.layout')

@section('konten')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  Rp. <span id="penjualan">0</span>
                </h3>

                <p>Penjualan Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3>
                  Rp. <span id="profit">0</span>
              </h3>

                <p>Profit Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <span id="supplier">0</span> pcs
                </h3>

                <p>Total Penjualan</p>
              </div>
              <div class="icon">
                <i class="fas fa-truck"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
                  <span id="barang">0</span> produk
                </h3>

                <p>Total Barang</p>
              </div>
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

 
    </section>
    <!-- /.content -->
  </div>
    @if (session('forbidden'))
    <script type="text/javascript">
      $(function() {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
        });

        Toast.fire({
            icon: 'warning',
            title: "{{ session('forbidden')}}"
        })
      });

</script>
@endif

<script>
  setInterval(function () {
    $.ajax({
      url: '/dashboard/penjualan',
      type: 'get',
      success: function (result) {
        let UbahFormat = result.penjualan;
        let reverse = UbahFormat.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        $("#penjualan").html(ribuan);
      }
    });
  }, 1000);

  setInterval(function () {
    $.ajax({
      url: '/dashboard/profit',
      type: 'get',
      success: function (result) {
        let UbahFormat = result.profit;
        let reverse = UbahFormat.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        $("#profit").html(ribuan);
      }
    });
  }, 1000);

  setInterval(function () {
    $.ajax({
      url: '/dashboard/supplier',
      type: 'get',
      success: function (result) {
        $('#supplier').html(result.supplier);
      }
    });
  }, 1000);

  setInterval(function () {
    $.ajax({
      url: '/dashboard/barang',
      type: 'get',
      success: function (result) {
        $('#barang').html(result.barang);
      }
    });
  }, 1000);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    var year = <?php echo $bulan; ?>;
    var user = <?php echo $user; ?>;
    var barChartData = {
        labels: year,
        datasets: [{
            label: 'Penjualan',
            backgroundColor: "blue",
            data: user
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Statistik penjualan'
                }
            }
        });
    };

</script>

@endsection