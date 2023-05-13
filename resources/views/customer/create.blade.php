@extends('layouts.main')

@include('partials.navbar')

@section('content')
<div class="content-wrapper" style="min-height: 1203.31px;">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Data {{ $title }}</h3>
              </div>
              <form action="/act" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                  </div>
                  <div class="form-group">
                    <label for="no_telp">No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" id="no_telp" required>
                  </div>
                  </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="/customer" class="btn btn-dark">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


@endsection