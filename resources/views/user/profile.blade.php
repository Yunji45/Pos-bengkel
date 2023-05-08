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
          <div class="col-md-6">
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" 
                      src="{{ asset('photo/' . auth()->user()->photo) }}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>
                
                <p class="text-muted text-center">{{auth()->user()->email}}</p>

                <form action="/profile" method="post" class="form-horizontal" enctype="multipart/form-data">
                  @csrf

                  <div class="form-group row">
                      <label for="name" class="col-sm-2 col-form-label">Ubah Nama</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="email" class="col-sm-2 col-form-label">Ubah Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="photo" class="col-sm-2 col-form-label">Ubah Photo</label>
                      <div class="col-sm-10">
                        <input type="file" name="photo" class="form-control" id="photo" >
                      </div>
                    </div>

                  <button type="submit" class="btn btn-primary btn-block"><b>Update Profile</b></button>

                </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>

          <div class="col-md-6">
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
               

                <form action="/updatepassword" method="post" class="form-horizontal">
                  @csrf

                  <div class="form-group row">
                      <label for="password" class="col-sm-2 col-form-label">Ubah Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" required>
                      </div>
                      @error('password')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group row">
                      <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password_confirmation" 
                        class="form-control" id="password_confirmation" required>
                      </div>
                    </div>

                  <button type="submit" class="btn btn-primary btn-block"><b>Update Password</b></button>

                </form>
              </div>
              <!-- /.card-body -->
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