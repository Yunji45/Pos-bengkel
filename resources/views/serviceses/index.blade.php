@extends('template.layout')

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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data {{ $title }}</h3>
                <div class="card-tools">
                <a href="/barang/create" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Tambah Data {{ $title }}
                </a>
                <button type="button" class="btn btn-success" data-toggle="modal" 
                    data-target="#modalImport">
                        <i class="fas fa-file-excel"></i> Import Data {{ $title }}
                    </button>
                    </div>
                </div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-hover table-sm" id="datatable">
                  <thead class="bg-primary">                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Supplier</th>
                      <th>Barcode</th>
                      <th>Nama</th>
                      <th>Harga Jual</th>
                      <th>Profit</th>
                      <th>Aksi</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no =1;
                    @endphp
                    @foreach ($service as $item)
                    <tr>
                      <td>{{$no++}}</td>
                      <td>{{$item->supplier->nama}}</td>
                      <td>{{$item->barcode}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{ "Rp. ". number_format($item->harga_jual, 0, ',', '.') }}</td>
                      <td>{{ "Rp. ". number_format($item->profit, 0, ',', '.') }}</td>
                      <td>
                        <a href=""
                        class="btn btn-warning text-white btn-sm"><i class="fas fa-edit"></i>
                        Edit</a>
                        <a href="" 
                        onclick="return confirm('Yakin akan dihapus?')" 
                        class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i>Hapus</a>
                      </td>
                    </tr>

                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="modalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Import {{ $title }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/supplier/import" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                    <label for="file">Upload File</label>
                    <input type="file"  name="file" class="form-control" id="file" required>
            </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
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