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
                <a href="/create-antrian" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Ambil Antrian
                </a>
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
                                <th scope="col">No Antrian</th>
                                <th scope="col">Nama</th>
                                <th scope="col">No.Telepon</th>
                                <th scope="col">Waktu Antrian</th>
                                <th scope="col">Cetak</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr style="text-align: center">
                                        <td>{{ $item->no_antrian }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_telp }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a class="btn btn-success" a href="/cetak" target="_blank"><i class="bi bi-printer"></i></a>


                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </section><!-- End Hero -->




    </div>
    <!-- Modal -->
@endsection


@include('partials.footer')