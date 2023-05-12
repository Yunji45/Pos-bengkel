@extends('layouts.main')

@include('partials.navbar')

@section('content')
    <div style="height: 800px">

    <section id="antrian" class="d-flex align-items-center">
        <div class="container" style="margin-top: 150px">

            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @auth
                <!-- Button Modal -->
                <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal"  data-bs-target="#createAntrian">
                    <i class="bi bi-file-plus me-1"></i>Ambil Antrian
                </button>
            @else
                <a href="/login" type="button" class="btn btn-primary my-3">
                    <i class="bi bi-file-plus me-1"></i>Login Untuk Ambil Antrian
                </a>
            @endauth
    
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table_id">
                            <thead>
                              <tr style="text-align: center">
                                <th scope="col">No</th>
                                <th scope="col">No Antrian</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No.Telepon</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Tgl. Antrian</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </section><!-- End Hero -->




    </div>
    <!-- Modal -->
<div wire:ignore.self class="modal fade" id="createAntrian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Form Ambil Antrian</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="close_modal" aria-label="Close"></button>
        </div>

        <form wire:submit.prevent="save">
            <div class="modal-body">
              <div class="mb-3">
                <label>Tanggal Antrian</label>
                <input type="text" id="tanggal_antrian" class="form-control" value=""readonly>
                @error('tanggal_antrian') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
              <div class="mb-3">
                <label>Nomor Antrian</label>
                <input type="string" id="no_antrian" class="form-control" value="" readonly>
                @error('no_antrian') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" id="nama" class="form-control">
                @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <textarea class="form-control" wire:model="alamat" cols="20"></textarea>
                @error('alamat') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Nomor HP</label>
                <input type="text" id="no_hp" class="form-control">
                @error('no_hp') <span class="text-danger">{{ $message }}</span> @enderror
            </div> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="close_modal" >Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>

      </div>
    </div>
  </div>
@endsection

@section('script')
    <script>
        window.addEventListener('closeModal', event => {
            $('#createAntrian').modal('hide')
            $('#editAntrian').modal('hide')
            $('#deleteAntrian').modal('hide')
        })
    
    </script>
@endsection

@include('partials.footer')