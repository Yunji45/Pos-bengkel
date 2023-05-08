@extends('template.layout')
@section('konten')
<form action="{{route('akun.store')}}" method="POST">@csrf
 <fieldset><legend>Input Data Akun</legend>
 <div class="form-group row">
 <div class="col-md-5">
 <label for="usname">Kode Akun</label>
 <input id="usname" type="text" name="kodeakun" class="form-control"required>
 </div>
 <div class="col-md-5">
 <label for="nama">Nama Akun</label>
 <input id="nama" type="text" name="nama" class="form-control"required>
 </div>
 </div>
 <div class="col-md-10">
 <input type="submit" class="btn btn-success btn-send" value="Simpan">
 <input type="Button" class="btn btn-primary btn-send" value="Kembali" onclick="history.go(-1)">
 </div>
 <hr>
 </fieldset>
</form>
@endsection