
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fietsen Bouwer | Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  
  <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
  
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box" style="margin-top: -100px">
  <div class="login-logo">
    <a href="/"><b>Fietsen</b>Bouwer</a>
  </div>
  
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Daftar Terlebih Dahulu</p>

      <form action="" method="post">
        @csrf
        <div class="input-group mb-3">
            <label for="name">Nama</label>
            <input class="form-control" type="text" name="name" value="{{ old('name')}}">
        </div>
        <div class="input-group mb-3">
            <label for="email">Email</label>
            <input class="form-control" type="text" name="email" value="{{ old('email')}}">
        </div>
        <div class="input-group mb-3">
            <label for="password">Password</label>
            <input class="form-control" type="text" name="password" value="{{ old('password')}}">
        </div>

        <div class="row justify-content-end">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>

</body>
</html>
