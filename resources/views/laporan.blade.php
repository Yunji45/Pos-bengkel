@extends('template.layout')
@section('konten')
<div class="content-wrapper" style="min-height: 1203.31px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Laporan</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Penjualan</h3>
                <div class="card-tools">
                    <a href="/laporan/pdf" class="btn btn-primary btn-sm" target="_blank">
                    <i class="fas fa-file-pdf"></i> Ekspor PDF
                    </a>
                </div>
                </div>
              <div class="card-body">
              <table class="table table-bordered table-striped table-hover table-sm" id="datatable">
                  <thead class="bg-primary">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Kasir</th>
                      <th>No Invoice</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Terjual</th>
                      <th>Total Harga</th>
                      <th>Tanggal Transaksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                    @endphp
                    @foreach ($penjualan as $item)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td>{{ $item->kode_penjualan }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ rupiah($item->total_harga) }}</td>
                        <td>{{ $item->created_at }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Penjualan Pertanggal</h3>
                </div>
              <div class="card-body">
                <form action="/laporan/pertanggal" method="post" target="_blank">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal_awal">Tanggal Awal</label>
                        <input type="date" name="tanggal_awal" id="tanggal_awal" 
                        class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" 
                        class="form-control form-control-sm" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@if (session('success'))
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    Toast.fire({
        icon: 'success',
        title: "{{ session('success')}}"
    })
  });

</script>

@endif
@endsection