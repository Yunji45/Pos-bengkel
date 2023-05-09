@extends('template.layout')
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('konten')
<div class="content-wrapper" style="min-height: 1203.31px;">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Kasir</a></li>
              <li class="breadcrumb-item active">{{ auth()->user()->name }}</li>
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
                <strong>No Invoice: </strong>{{ request()->segment(2) }}
                </div>
              <div class="card-body">
              <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a
                              class="nav-item nav-link active"
                              id="nav-services-tab"
                              data-toggle="tab"
                              href="#nav-services"
                              role="tab"
                              aria-controls="nav-services"
                              aria-selected="true">Services</a>
                          <a
                              class="nav-item nav-link"
                              id="nav-sparepart-tab"
                              data-toggle="tab"
                              href="#datatable"
                              role="tab"
                              aria-controls="nav-sparepart"
                              aria-selected="false">Sparepart</a>
                      </div>
                  </nav>

              <table class="table table-bordered table-striped table-hover table-sm" id="datatable">
                  <thead class="bg-primary">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Barcode</th>
                      <th>Nama Barang</th>
                      <th>Harga Barang</th>
                      <th>QTY</th>
                      <th>Total Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $no = 1;
                      $total_pembayaran = 0;
                    @endphp
                    @foreach ($penjualan as $item)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->barcode }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ rupiah($item->harga_jual) }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ rupiah($item->total_harga) }}</td>
                        <td>
                          <a href="/penjualan/tambah_qty/{{ $item->id_penjualan }}" 
                            class="btn btn-success btn-sm">
                            <i class="fas fa-plus"></i>
                          </a>
                          <a href="/penjualan/kurangi_qty/{{ $item->id_penjualan }}" 
                          class="btn btn-warning text-white btn-sm">
                            <i class="fas fa-minus"></i>
                          </a>
                          <a href="/penjualan/hapus/{{ $item->id_penjualan }}" 
                          onclick="return confirm('Yakin akan dihapus?')"
                          class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    @php
                      $total_pembayaran = $total_pembayaran + $item->total_harga;
                    @endphp
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <form action="/penjualan" method="post">
                    @csrf
                    <div class="form-group">
                      <input type="hidden" name="kode_penjualan" value="{{ request()->segment(2) }}">
                        <input type="text" name="nama" id="" class="form-control form-control-sm" 
                        placeholder="Masukan nama barang" autofocus required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">Submit</button>
                    </div>
                </form>
                <hr>
                <form name="form-simpan-transaksi">
                    <div class="form-group">
                      <input type="hidden" name="" id="kode_penjualan" value="{{ request()->segment(2) }}">
                        <input type="text" name="" id="" class="form-control form-control-sm" 
                          placeholder="Total Pembayaran" value="{{ rupiah ($total_pembayaran) }}" readonly>
                        <input type="hidden" name="total_pembayaran" id="total_pembayaran" 
                        value="{{ $total_pembayaran }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="" id="pembayaran" class="form-control form-control-sm" 
                          placeholder="Pembayaran" autocomplete="off" onkeyup="kalkulasi()" required>
                        <input type="hidden" name="pembayaran" id="pembayaran1">
                    </div>
                    <div class="form-group">
                        <input type="text" name="" id="kembalian" class="form-control form-control-sm" 
                          placeholder="Kembalian" readonly>
                        <input type="hidden" name="kembalian" id="kembalian1">
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block btn-sm" 
                        id="btnSimpanTransaksi">Simpan 
                          Transaksi</button>
                    </div>
                </form>
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
<script>
  $('#pembayaran').on('keyup', function(){
    $(this).mask('000.000.000', {reverse: true});
  })

  function kalkulasi() {
    let pembayaran = $('#pembayaran').val().split('.');
    let pembayaran1 = $('#pembayaran1').val(pembayaran.join(""));

    let total_pembayaran = $('#total_pembayaran').val();
    let hasil = pembayaran1.val() - total_pembayaran;
    let convert = parseInt(hasil).toLocaleString("id-ID");

    $('#kembalian').val(convert);
    $('#kembalian1').val(hasil);
  }
    $(document).on('click', '#btnSimpanTransaksi', function() {
      let _token = $('meta[name="csrf-token"]').attr('content');
      let kode_penjualan = $('#kode_penjualan').val();
      let total_pembayaran = $('#total_pembayaran').val();
      let pembayaran = $('#pembayaran').val();
      let pembayaran1 = $('#pembayaran1').val();
      let kembalian1 = $('#kembalian1').val();

      if (pembayaran == '') {
        alert('Pembayaran masih kosong');
        $('#pembayaran').addClass('is-invalid');
        $('#pembayaran').focus();
      } else {

      }

      $.ajax({
        url: '/penjualan/simpan_transaksi',
        type: 'post',
        data: {
          _token: _token,
          kode_penjualan: kode_penjualan,
          total_pembayaran: total_pembayaran,
          pembayaran: pembayaran1,
          kembalian: kembalian1,
        },
        success: function (result) {
          if (result.success == true) {
              alert(result.message);
              window.open('/penjualan/struk/' + kode_penjualan, '_blank');
              window.location.href = '/penjualan/{{ no_invoice() }}';
          }
        }
      });
    });
</script>
@endsection